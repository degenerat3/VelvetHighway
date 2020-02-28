import requests
import random

USERNAME = ""
PASSWORD = ""

first_names = ["Alex", "Abe", "Anthony", "Anne", "Aubery", "Ben", "Becca", "Charles", "Chloe", "Dan", "Dorothy", "Jim", "Micah", "Liam", "Noah", "William", "Oliver", "Luke", "Chad", "Tom", "Brett", "Aaron", "DJ", "Kyle", "Kathy", "Sarah", "Naia", "Lauren", "Katie", "Caroline", "Kat", "Kelly", "Erin", "Olivia", "Megan"]
last_names = ["Dimaggio", "Ruth", "Mantle", "Gehrig", "Teixeira", "Jeter", "Sanchez", "Hicks", "Romine", "Ottavino", "Paxton", "Loaisiga", "Kahnle", "Severino", "Happ", "Green", "Tanaka", "Chapman", "Cessa", "Britton", "Stanton", "Judge", "Torres", "LeMahieu", "Urshela", "Voit", "Frazier", "Ford", "Gardner"]
email_co = ["bestmail", "badmail", "malwaremail", "cybermail", "atomicmail", "smartmail", "hackermail"]
email_ext = ["cyber", "ai", "meme", "secure", "edu", "cloud", "hack", "pwn", "system"]
prodids = ["1", "2", "4", "5", "6", "7"]

def generateVariables():
    fn = random.choice(first_names)
    ln = random.choice(last_names)
    email = fn + "." + ln + "@" + random.choice(email_co) + "." + random.choice(email_ext)
    cc = random.randint(1111111111111111, 9999999999999999)
    cvv = random.randint(100, 999)
    prodid = random.choice(prodids)
    return fn, ln, email, prodid, cc, cvv

def sendVariables(teamnum, fn, ln, email, prodid, cc, cvv):
    names = ["FirstName", "LastName", "Email", "ProdID", "CCNum", "CVV"]
    vals = [fn, ln, email, prodid, cc, cvv]
    for i in range(6):
        header = {'Content-type': 'application/json', 'kbn-xsrf': 'true'}
        n = names[i]
        v = vals[i]
        data = {"value": v}
        endpoint = "https://scorestack.ists.io/api/scorestack/attribute/web-vh-team_{}/{}".format(teamnum, n)
        request = requests.post(endpoint, headers=header, data=json.dumps(data), auth=HTTPBasicAuth(USERNAME, PASSWORD))
        print(endpoint)
        print(data)
    return

def main():
    for teamnum in range(1,16):
        fn, ln, em, prid, ccnum, cvv = generateVariables()
        sendVariables(teamnum, fn, ln, em, prid, ccnum, cvv)

main()