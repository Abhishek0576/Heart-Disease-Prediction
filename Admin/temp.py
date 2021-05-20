#!/usr/bin/env python

import pandas as pd

df = pd.read_csv("heart_statlog_cleveland_hungary_final.csv")

df.rename(columns = {'resting bp s':'resting bps'}, inplace = True)
df.rename(columns = {'ST slope':'slope'}, inplace = True)
df.rename(columns = {'fasting blood sugar':'fbs'}, inplace = True)
df.rename(columns = {'chest pain type':'cp'}, inplace = True)

html = df.to_html()
text_file = open("training_data.html", "w")
text_file.write(html)
text_file.close()

print(html)