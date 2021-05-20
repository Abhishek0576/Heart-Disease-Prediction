import sys
import numpy as np
import pandas as pd
from model import *

age = 40
gender = 1
cp = 2
fbs = 1
restecg = 1
exerangina = 0
slope = 1
restbps = 111
cholestrol = 180
maxheartrate = 100
oldpeak = 0

sex0, sex1 = 0.0, 0.0
if gender == 0:
   sex0 = 1.0
else:
   sex1 = 1.0 

fbs0, fbs1 = 0.0, 0.0
if fbs == 0: 
   fbs0 = 1.0
else:
   fbs1 = 1.0   

cp1, cp2, cp3, cp4 = 0.0, 0.0, 0.0, 0.0 
if cp == 1:
   cp1 = 1.0
elif cp == 2:
   cp2 = 1.0
elif cp == 3:
   cp3 = 1.0
elif cp == 4:
   cp4 = 1.0    

restecg0, restecg1, restecg2 = 0.0, 0.0, 0.0
if restecg == 1:
   restecg0 = 1.0
elif restecg == 2:
   restecg1 = 1.0
elif restecg == 3:
   restecg2 = 1.0   

exang0, exang1 = 0.0, 0.0
if exerangina == 0:
   exang0 = 1.0
else:
   exang1 = 1.0 

slope0, slope1, slope2, slope3 = 0.0, 0.0, 0.0, 0.0 
if slope == 0:
   slope0 = 1.0
elif slope == 1:
   slope1 = 1.0
elif slope == 2:
   slope2 = 1.0
elif slope == 3:
   slope3 = 1.0     

data =  { 'age':[age], 'resting bp s':[restbps], 'cholesterol':[cholestrol], 
          'max heart rate':[maxheartrate], 'oldpeak':[oldpeak],
          'sex_0':[sex0], 'sex_1':[sex1], 
          'cp_1':[cp1], 'cp_2':[cp2], 'cp_3':[cp3], 'cp_4':[cp4],
          'fbs_0':[fbs0], 'fbs_1':[fbs1], 
          'resting ecg_0':[restecg0], 'resting ecg_1':[restecg1], 'resting ecg_2':[restecg2],
          'exercise angina_0':[exang0], 'exercise angina_1':[exang1], 
          'slope_0':[slope0], 'slope_1':[slope1], 'slope_2':[slope2], 'slope_3':[slope3] }

dframe = pd.DataFrame(data)
dframe = dframe.astype(float)
test = dframe

########

df = pd.read_csv("heart_statlog_cleveland_hungary_final.csv")
df.rename(columns = {'ST slope':'slope'}, inplace = True)
df.rename(columns = {'fasting blood sugar':'fbs'}, inplace = True)
df.rename(columns = {'chest pain type':'cp'}, inplace = True)

a = pd.get_dummies(df['sex'], prefix = "sex")
b = pd.get_dummies(df['cp'], prefix = "cp")
c = pd.get_dummies(df['fbs'], prefix = "fbs")
d = pd.get_dummies(df['resting ecg'], prefix = "resting ecg")
e = pd.get_dummies(df['exercise angina'], prefix = "exercise angina")
f = pd.get_dummies(df['slope'], prefix = "slope")



frames = [df, a, b, c, d, e, f,]
df = pd.concat(frames, axis = 1)
df = df.drop(columns = ['sex', 'cp', 'fbs', 'resting ecg', 'exercise angina', 'slope'])

y = df.target.values
x_data = df.drop(['target'], axis = 1)
x = (x_data - np.min(x_data)) / (np.max(x_data) - np.min(x_data)).values

x_train, x_test, y_train, y_test = train_test_split(x,y,test_size = 0.2,random_state=0)

x_train = x_train.T
y_train = y_train.T
x_test = x_test.T
y_test = y_test.T

weight, bias = logistic_regression(x_train,y_train,x_test,y_test,1,100)

test_norm = normalize(test,x_data)
# print(test_norm.to_html())
test_norm = test_norm.T

# print('weight',weight)
# print('bias',bias)

res = predictPercentage(weight,bias,test_norm)
print(res)

lr = LogisticRegression()
lr.fit(x_train.T,y_train.T)
y_pred_lr = lr.predict(x_test.T)
score_lr = round(accuracy_score(y_pred_lr,y_test.T)*100,2)

# print("Test Accuracy {:.2f}%".format(score_lr))

# confusionMatrix(y_test,y_pred_lr)


########################################

d = {}

if(res >= 50 ):
     d["Logistic Regression"] = "Not Suffered"
else:
     d["Logistic Regression"] = "Suffered from Heart Disease"


from sklearn.neighbors import KNeighborsClassifier
knn = KNeighborsClassifier(n_neighbors = 2)  # n_neighbors means k
knn.fit(x_train.T, y_train.T)
score_knn = knn.score(x_test.T, y_test.T)*100
prediction = knn.predict(test_norm.T)
per = prediction[0]
if(per == 0):
     d["KNeighborsClassifier"] = "Not Suffered"
elif(per == 1):
     d["KNeighborsClassifier"] = "Suffered from Heart Disease"


from sklearn.svm import SVC
svm = SVC()
svm.fit(x_train.T, y_train.T)
score_svm = svm.score(x_test.T, y_test.T)*100
prediction = svm.predict(test_norm.T)
per = prediction[0]
if(per == 0):
     d["SVM"] = "Not Suffered"
elif(per == 1):
     d["SVM"] = "Suffered from Heart Disease"


from sklearn.naive_bayes import GaussianNB
nb = GaussianNB()
nb.fit(x_train.T, y_train.T)
score_nb = nb.score(x_test.T, y_test.T)*100
prediction = nb.predict(test_norm.T)
per = prediction[0]
if(per == 0):
     d["Naive Bayes"] = "Not Suffered"
elif(per == 1):
     d["Naive Bayes"] = "Suffered from Heart Disease"


methods = ["Logistic Regression", "KNN", "SVM", "Naive Bayes"]
accuracy = [84.87, score_knn, score_svm, score_nb ]
sns.set_style("whitegrid")
plt.figure(figsize=(16,7))
plt.yticks(np.arange(0,100,10))
plt.ylabel("Accuracy %")
plt.xlabel("Algorithms")
sns.barplot(x=methods, y=accuracy)
plt.savefig("../Images/barchart.png")

methods = ["Logistic Regression", "KNN", "SVM", "Naive Bayes"]
accuracy = [84.87, score_knn, score_svm, score_nb ]
sns.set_style("whitegrid")
plt.figure(figsize=(16,7))
plt.yticks(np.arange(0,100,10))
plt.ylabel("Accuracy %")
plt.xlabel("Algorithms")
plt.pie(x=accuracy, labels=methods)
plt.savefig("../Images/piechart.png")

i=0
html = """<html><table border="1">
<tr><th>Algorithm Name</th><th>Accuracy Score</th><th>Result</th></tr>"""
for key,value in d.items():
      html += "<tr><td>{}</td>".format(key)
      html += "<td>{}</td>".format(round(accuracy[i],2))
      if value == "Not Suffered":
         html += "<td class='bg-success'>{}</td>".format(value)
      else:
         html += "<td class='bg-danger'>{}</td>".format(value)
      html += "</tr>"
      i += 1
html += "</table></html>"

f = open("data.html","w")
f.write(html)