baaswoord = "baas"
medewoord = "medewerker"

invoer = ""
invoer = input("wat is het wachtwoord?")


if invoer == baaswoord:
    print("Totale toegang")

elif invoer == medewoord:
    print("Gedeeltelijke toegang")

else:
    print("geen toegang")
