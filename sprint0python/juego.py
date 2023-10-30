import random

def juego():
    opciones = ['piedra', 'papel', 'tijera']
    victorias_persona = 0
    victorias_ia = 0
    ronda = 0

    while ronda < 5:
        jugada_persona = input("Elige tu jugada (piedra, papel, tijera): ")
        jugada_ia = random.choice(opciones)
        print("La jugada del programa es: ", jugada_ia)

        if jugada_persona == jugada_ia:
            print("¡Has empatado! Vamos a la siguiente ronda.")
            continue

        if ((jugada_persona == 'piedra' and jugada_ia == 'tijera') or 
            (jugada_persona == 'papel' and jugada_ia == 'piedra') or 
            (jugada_persona == 'tijera' and jugada_ia == 'papel')):
            victorias_persona += 1
            print("¡Has ganado la ronda!")
        else:
            victorias_ia += 1
            print("Has perdido la ronda.")

        ronda += 1

    if victorias_persona > victorias_ia:
        print("¡Felicidades! Has ganado después de ", ronda, " rondas.")
    else:
        print("Lo siento, has perdido después de ", ronda, " rondas.")

juego()
