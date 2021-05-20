import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
import seaborn as sns
from sklearn.linear_model import LogisticRegression
from sklearn.model_selection import train_test_split
from sklearn.metrics import accuracy_score
from sklearn.metrics import confusion_matrix

def normalize(test, x_data):
    test_norm = (test - np.min(x_data)) / (np.max(x_data) - np.min(x_data)).values
    return test_norm

def initialize(dimension):
    weight = np.full((dimension,1),0.01)
    bias = 0.0
    return weight,bias


def sigmoid(z):
    # sigmoid( z) = 1/1+exp(-z), Where z = wx+b
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
    cost = np.sum(loss) / x_train.shape[1]   # train data shape - 952
    
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
        
        #print(cost)[]
        #print(gradients)
        
        weight = weight - learningRate * gradients["Derivative Weight"]
        bias = bias - learningRate * gradients["Derivative Bias"]
        
        costList.append(cost)
        index.append(i)

    parameters = {"weight": weight,"bias": bias}
    
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
    
    # print("head",y_head)

    y_prediction = np.zeros((1,x_test.shape[1]))
    # print(y_head)

    for i in range(y_head.shape[1]):
        if y_head[0,i] <= 0.5:
            y_prediction[0,i] = 0
        else:
            y_prediction[0,i] = 1

    # print("after",y_prediction)

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
    
    #print("Manual Test Accuracy for our own LR model: {:.2f}%".format((100 - np.mean(np.abs(y_prediction - y_test))*100)))

    return parameters["weight"],parameters["bias"]

def confusionMatrix(y_test, y_prediction):
    cm=confusion_matrix(y_test, y_prediction)
    conf_matrix=pd.DataFrame(data=cm,columns=['Predicted:0','Predicted:1'],index=['Actual:0','Actual:1'])
    plt.figure(figsize = (8,5))
    sns.heatmap(conf_matrix, annot=True,fmt='d',cmap="YlGnBu")
    plt.show()
