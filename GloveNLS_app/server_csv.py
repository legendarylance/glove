import pickle
from sklearn.neighbors import NearestNeighbors
import pandas as pd
import time

print "starting to work"
with open('np_array.pkl', 'rb') as file:
    np_array = pickle.load(file)
	
print "np_array is loaded"

with open('names.pkl', 'rb') as file:
    names = pickle.load(file)
	
print "names are loaded"

neigh = NearestNeighbors(n_neighbors=5, metric = 'cosine')
neigh.fit(np_array)
print "KNN has been trained"

def getSyns(word):
    ind = names.index(word)
    neib = neigh.kneighbors(np_array[ind].reshape(1, -1))
    words = []
    for i in neib[1][0]:
        words.append(names[i])
    return words
	
for j in range(2,100):
    master = []
    for i in range((j-1)*1000,j*1000):
        master.append(getSyns(names[i]))
    df = pd.DataFrame(master)
    df.to_csv("master_%s.csv"%j)
    print "finished run %d, file saved"%j

 
#start = time.time()
#master = []
#for i in range(5000):
#	master.append(getSyns(names[i]))
#df = pd.DataFrame(master)
#df.to_csv("master_test.csv")
#end = time.time()
#print(end - start)
