import sys
import numpy as np
import pandas as pd
import seaborn as sns
from sklearn.linear_model import LogisticRegression
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
from sklearn.metrics import confusion_matrix
import matplotlib.pyplot as plt

age = float(sys.argv[1])
gender = int(sys.argv[2])
totChol = float(sys.argv[3])
sysBP = float(sys.argv[4])
currentSmoker = int(sys.argv[5])
diabetes = int(sys.argv[6])
BPMeds = int(sys.argv[7])
prevalentStroke = int(sys.argv[8])

# print(age, gender, totChol, sysBP, currentSmoker, diabetes, BPMeds, prevalentStroke)

male0, male1 = 0.0, 0.0
if gender == 0:
   male0 = 1.0
else:
   male1 = 1.0 

currentSmoker0, currentSmoker1 = 0.0, 0.0
if currentSmoker == 0: 
   currentSmoker0 = 1.0
else:
   currentSmoker1 = 1.0   

BPMeds0, BPMeds1 = 0.0, 0.0
if BPMeds == 0:
   BPMeds0 = 1.0
elif BPMeds == 1:
   BPMeds1 = 1.0

prevalentStroke0, prevalentStroke1 = 0.0, 0.0
if prevalentStroke == 0:
   prevalentStroke0 = 1.0
elif prevalentStroke == 1:
   prevalentStroke1 = 1.0

diabetes0, diabetes1 = 0.0, 0.0
if diabetes == 0:
   diabetes0 = 1.0
elif diabetes == 1:
   diabetes1 = 1.0

data =  { 
          'age':[age], 'totChol':[totChol], 'sysBP':[sysBP], 
          'male_0':[male0], 'male_1':[male1], 
          'currentSmoker_0':[currentSmoker0], 'currentSmoker_1':[currentSmoker1],
          'BPMeds_0':[BPMeds0], 'BPMeds_1':[BPMeds1], 
          'prevalentStroke_0':[prevalentStroke0], 'prevalentStroke_1':[prevalentStroke1],
          'diabetes_0':[diabetes0], 'diabetes_1':[diabetes1],
        }

dframe = pd.DataFrame(data)
dframe = dframe.astype(float)
test = dframe

##############################################

df = pd.read_csv("framingham.csv")
df.drop(['education'],axis=1,inplace=True)
df.dropna(axis=0,inplace=True)

a = pd.get_dummies(df['male'], prefix = "male")
b = pd.get_dummies(df['currentSmoker'], prefix = "currentSmoker")
c = pd.get_dummies(df['BPMeds'], prefix = "BPMeds")
d = pd.get_dummies(df['prevalentStroke'], prefix = "prevalentStroke")
e = pd.get_dummies(df['diabetes'], prefix = "diabetes")

frames = [df, a, b, c, d, e,]
df = pd.concat(frames, axis = 1)
df.rename(columns={'BPMeds_0.0':'BPMeds_0'},inplace=True)
df.rename(columns={'BPMeds_1.0':'BPMeds_1'},inplace=True)
df = df.drop(columns = ['male', 'currentSmoker', 'BPMeds', 'prevalentHyp', 'prevalentStroke', 'diabetes', 'prevalentHyp', 'cigsPerDay', 'diaBP', 'BMI', 'heartRate', 'glucose'])

y = df.TenYearCHD.values

x_data = df.drop(['TenYearCHD'], axis = 1)

x = (x_data - np.min(x_data)) / (np.max(x_data) - np.min(x_data)).values

x_train, x_test, y_train, y_test = train_test_split(x,y,test_size = 0.4,random_state=0)

x_train = x_train.T
y_train = y_train.T
x_test = x_test.T
y_test = y_test.T


def initialize(dimension):
    weight = np.full((dimension,1),0.01)
    bias = 0.0
    return weight,bias

def sigmoid(z):
    y_head = 1/(1 + np.exp(-z))
    return y_head    

def forwardBackward(weight,bias,x_train,y_train):

    '''
    m = X.shape[1]
 
    # FORWARD PROPAGATION (FROM X TO COST)
    A = sigmoid(np.dot(w.T, X)+ b) # compute activation
    cost = -(1/m)*(np.sum((Y*np.log(A)) + (1-Y) *np.log(1-A)))
 
    # BACKWARD PROPAGATION (TO FIND GRAD)
    dw = (1/m)* np.dot(X, ((A-Y).T))
    db = (1/m) * np.sum(A-Y)
    
    '''
    
    ## Forward
    
    y_head = sigmoid(np.dot(weight.T,x_train) + bias)
     
    loss = -(y_train*np.log(y_head) + (1-y_train)*np.log(1-y_head))
    cost = np.sum(loss) / x_train.shape[1] 
    
    ## Backward
    
    derivative_weight = np.dot(x_train,((y_head-y_train).T))/x_train.shape[1]
    
    derivative_bias = np.sum(y_head-y_train)/x_train.shape[1]
    gradients = {"Derivative Weight" : derivative_weight, "Derivative Bias" : derivative_bias}
    
    return cost,gradients

def update(weight,bias,x_train,y_train,learningRate,iteration) :
    costList = []
    index = []
    
    #for each iteration, update weight and bias values
    for i in range(iteration):
        cost, gradients = forwardBackward(weight,bias,x_train,y_train)
        
        #print(cost)
        #print(gradients)
        
        weight = weight - learningRate * gradients["Derivative Weight"]
        bias = bias - learningRate * gradients["Derivative Bias"]
        
        costList.append(cost)
        index.append(i)

    parameters = {"weight": weight,"bias": bias}

    # print("weight:",weight)
    # print("bias:",bias)
    # 
    # print("iteration:",iteration)
    # print("cost:",cost)

    # plt.plot(index,costList)
    # plt.xlabel("Number of Iteration")
    # plt.ylabel("Cost")
    # plt.show()

    return parameters, gradients

def predict(weight,bias,x_test):
    z = np.dot(weight.T,x_test) + bias
    y_head = sigmoid(z)

    y_prediction = np.zeros((1,x_test.shape[1]))

    for i in range(y_head.shape[1]):
        if y_head[0,i] <= 0.5:
            y_prediction[0,i] = 0
        elif y_head[0,i] > 0.5:
            y_prediction[0,i] = 1
    return y_prediction


def predictPercentage(weight,bias,x_test):
    z = np.dot(weight.T,x_test) + bias
    y_head = sigmoid(z)
    per = round(y_head[0][0]*100,2)
    return per


def logistic_regression(x_train,y_train,x_test,y_test,learningRate,iteration):
    
    dimension = x_train.shape[0]
    # print(dimension) -> 17
    
    weight,bias = initialize(dimension)
    # print(weight) -> [[0.01][0.01][0.01][0.01][0.01][0.01][0.01][0.01][0.01][0.01][0.01][0.01][0.01][0.01][0.01][0.01][0.01]]
    # print(bias)   -> 0.0
          
    parameters, gradients = update(weight,bias,x_train,y_train,learningRate,iteration)

    y_prediction = predict(parameters["weight"],parameters["bias"],x_test)
    
    # print("Manual Test Accuracy for our own LR model: {:.2f}%".format((100 - np.mean(np.abs(y_prediction - y_test))*100)))

    return parameters["weight"],parameters["bias"]


test_norm = (test - np.min(x_data)) / (np.max(x_data) - np.min(x_data)).values
test_norm = test_norm.T

weight, bias = logistic_regression(x_train,y_train,x_test,y_test,1,100)
# print(weight, bias)

res = predictPercentage(weight,bias,test_norm)
print(res)