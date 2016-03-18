#this is a wireframe template of a training script

#reading the responseVar
#as.character(responseVar$V1)

#clear environment
rm(list=ls())

#set directory
#setwd("C:\\Users\\aftab\\Desktop\\sonictrain")

#required R packages
library(ada)
library(pROC)

inputFile   <- "uploads/uploadedinput.csv" #file where data is stored (expect RDS dataframe)
predsFile   <- "predsFile.txt" #names of columns in data to use when modeling (expect RDS vector)
responseVarFile <- "response.txt" #name of response variable column
modeltouse = as.character(read.table("model.txt")$V1)

#message('loading data from ', inputFile)
df        <- read.csv(inputFile)
preds     <- as.character(read.table(predsFile)$V1)
#responseVar = "CHF";
responseVar <- as.character(read.table(responseVarFile)$V1)
formula   <- as.formula(paste(responseVar,'~.',sep=''))

fileConn<-file("output1.txt")
writeLines(c("Hello","World"), fileConn)
close(fileConn)

# summary(df)
#message('row of df ', nrow(df))

# 10 fold cross validation
n = nrow(df)
res = data.frame()

#shuffle the data
df = df[sample(1:nrow(df)),]
#message('shuffle')

#for the time being, If I have forgotten to do this, please do it later on, and check in to github : Aftab
df = df[1:1000,]

for(i in 1:ncol(df)){df[,i] = as.numeric(df[,i])}

fileConn<-file("output2.txt")
writeLines(c("Hello","World"), fileConn)
close(fileConn)

folds = as.integer(read.table("folds.txt")$V1);
for (i in 1:folds) {
  message('begin ', i)
  data.train = df[which(1:n %% folds != i %% folds), ]
  data.test = df[which(1:n %% folds == i %% folds), ]
  
  message('training')
  # training part
  if(modeltouse == "ada")
  {
   model = ada(formula=formula, data=data.train[,which(names(data.train) %in% c(responseVar,preds))])
  }
  else if(modeltouse == "rpart")
  {
   model = rpart(formula=formula, data=data.train[,which(names(data.train) %in% c(responseVar,preds))])
  }
  message('testing')
  
  #this is if you want probabilities
  #pred = predict(model, newdata=data.test[,which(names(data.test) %in% c(responseVar,preds))], type='prob')[, 2]
  
  #this is if you want the class labels
  pred = predict(model, newdata=data.test[,which(names(data.test) %in% c(responseVar,preds))])
  
  res = rbind(res, cbind(data.test, pred))
}

fileConn<-file("output3.txt")
writeLines(c("Hello","World"), fileConn)
close(fileConn)

#final.model = ada(formula, data = df[,which(names(df) %in% c(responseVar, preds))])
#saveRDS(final.model, "model.RDS")

#message('test complete')

# get the metrics
#message('getting metrics')
#thresh = 0.5
tp = length(which(res[,names(res)==responseVar] == 1 & res$pred == 1))
tn = length(which(res[,names(res)==responseVar] == 0 & res$pred == 0))
fn = length(which(res[,names(res)==responseVar] == 1 & res$pred == 0))
fp = length(which(res[,names(res)==responseVar] == 0 & res$pred == 1))

fileConn<-file("output4.txt")
writeLines(c("Hello","World"), fileConn)
close(fileConn)

precision = round((tp / (tp + fp))*100)
recall = round((tp / (tp + fn))*100)
accuracy = round(((tp + tn) / (tp + fp + tn + fn)) * 100)
#auc = round((roc(res[,names(res)==responseVar], res$pred)$auc)*100)

fileConn<-file("output5.txt")
writeLines(c("Hello","World"), fileConn)
close(fileConn)

#generating the outputdf
outputdf = data.frame(precision,recall,accuracy,tp,tn,fp,fn)

fileConn<-file("output6.txt")
writeLines(c("Hello","World"), fileConn)
close(fileConn)

#write output
write.csv(outputdf,"output.csv",row.names=FALSE)

#writing details of run into summary.txt
count = as.character(read.table('globalcount.txt')$V1)
currentdate = Sys.Date();
comment = readChar('comment.txt', file.info('comment.txt')$size)
df = data.frame(count,currentdate,comment,precision,recall,accuracy)
write.csv(df,'summary.csv',row.names=FALSE)

print(count)
print("space");
print(comment)

fileConn<-file("output7.txt")
writeLines(c("Hello","World"), fileConn)
close(fileConn)
