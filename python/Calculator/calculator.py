operatior = input("Operatie? (+, -, *, /, %) ")

getal1 = float(input("Eerste getal? "))
getal2 = float(input("Tweede getal? "))

if getal2 == 0 and (operatior == "/"):
    print("Kan niet delen door 0")

elif getal2 == 0 and (operatior == "%"):
    print("Kan niet delen door 0")

elif operatior == "+":
    resultaat = getal1 + getal2
    print(f"Resultaat: {resultaat}")

elif operatior == "-":
    resultaat = getal1 - getal2
    print(f"Resultaat: {resultaat}")

elif operatior == "*":
    resultaat = getal1 * getal2
    print(f"Resultaat: {resultaat}")

elif operatior == "/":
    resultaat = getal1 / getal2
    print(f"Resultaat: {resultaat}")

elif operatior == "%":
    resultaat = getal1 % getal2
    print(f"Resultaat: {resultaat}")

else:
    print("Ongeldige invoer!")
