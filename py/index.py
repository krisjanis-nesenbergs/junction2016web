import requests
r = requests.get(url='https://api.ouraring.com/v1/sleep?access_token=CT7NQBYLSVVUQ5N4NJ4CVVY7Q22DB7OB')
jobj = r.json()

print(jobj)
