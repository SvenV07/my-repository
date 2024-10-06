import random

def roulette_game():
    chips = 10
    print("Je hebt 10 chips.")

    while chips > 0:
        print(f"\nJe hebt {chips} chips!")
        inzet = []
        while True:
            keuze = input("Kies een nummer tussen 0 en 36. zeg STOP om in te zetten: ")
            if keuze.lower() == "stop":
                break

            try:
                nummer = int(keuze)
                if 0 <= nummer <= 36:
                    if chips > 0:
                        inzet.append(nummer)
                        chips -= 1
                        print(f"Ingezet op {nummer}. Chips over: {chips}")
                    else:
                        print("Je hebt geen chips meer")
                        break
                else:
                    print("Ongeldig nummer")
            except ValueError:
                print("ongeldige invoer")

        print("\nRien ne va plus")

        winnende_nummer = random.randint(0, 36)
        print(f"de uitkomst is {winnende_nummer}")

        winst = inzet.count(winnende_nummer) * 35
        chips += winst
        if winst > 0:
            print(f"Je hebt {winst} chips")
        else:
            print("geen winst deze ronde.")

        if chips == 0:
            print("\nGAME OVER")
            break

roulette_game()
