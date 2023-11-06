import random


def juego():
    # Defino las opciones del juego
    opciones = ['piedra', 'papel', 'tijera']
    # Inicializamos los contadores de victorias y rondas
    victorias_persona = 0
    victorias_ia = 0
    ronda = 0

    # Todo se repetira hasta que se juegue 5 rondas
    while ronda < 5:
        # Pedimos que el usuario eliga su jugada
        jugada_persona = input("Elige tu jugada (piedra, papel, tijera): ")
        # La ia elige su jugada de forma aleatoria
        jugada_ia = random.choice(opciones)
        print("La jugada del programa es: ", jugada_ia)
        # Comprobamos si hay empate
        if jugada_persona == jugada_ia:
            print("¡Has empatado! Vamos a la siguiente ronda.")
            continue
        # Comprobamos si la persona ha ganado la ronda
        if ((jugada_persona == 'piedra' and jugada_ia == 'tijera') or 
            (jugada_persona == 'papel' and jugada_ia == 'piedra') or 
            (jugada_persona == 'tijera' and jugada_ia == 'papel')):
            victorias_persona += 1
            print("¡Has ganado la ronda!")
        else:
            # Si no ha habido empate y la persona no ha ganado, entonces gana la IA
            victorias_ia += 1
            print("Has perdido la ronda.")
        # Pasamos a la siguiente ronda
        ronda += 1
    # Al final del juego, comprobamos quien ha ganado mas rondas
    if victorias_persona > victorias_ia:
        print("¡Felicidades! Has ganado después de ", ronda, " rondas.")
    else:
        print("Lo siento, has perdido después de ", ronda, " rondas.")
# Llamamos a la funcion para empezar el juego
juego()
