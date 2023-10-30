opcion_correcta = False
opcion_incorrecta = False
puntuacion = 0

while not (opcion_correcta or opcion_incorrecta):
    print("¿Qué es algo que puedes ver en medio de la noche y del día, pero que no puedes ver en la mañana ni en la tarde?")
    print("A.La luna - B.El sol - C.La letra 'n'")
    opcion = input("Por favor, introduce una opción: ")

    if opcion == "A" or opcion == "a" or opcion == "B" or opcion == "b" :
        opcion_incorrecta = True
        print("Opción Incorrecta")
        puntuacion = puntuacion - 5
    elif opcion == "C" or opcion == "c":
        opcion_correcta = True
        print("Opción Correcta")
        puntuacion = puntuacion + 10
    else:
        print("Opción no reconocida")

opcion_correcta = False
opcion_incorrecta = False
while not (opcion_correcta or opcion_incorrecta):
    print("Soy un animal que vuela sin alas, corro sin patas y lloro sin ojos. ¿Qué soy?")
    print("A.Un pez - B.El viento - C.Un arbol")
    opcion = input("Por favor, introduce una opción: ")

    if opcion == "A" or opcion == "a" or opcion == "C" or opcion == "c" :
        opcion_incorrecta = True
        print("Opción Incorrecta")
        puntuacion = puntuacion - 5
    elif opcion == "B" or opcion == "b":
        opcion_correcta = True
        print("Opción Correcta")
        puntuacion = puntuacion + 10
    else:
        print("Opción no reconocida")

opcion_correcta = False
opcion_incorrecta = False
while not (opcion_correcta or opcion_incorrecta):
    print("No soy un pájaro, pero puedo volar; no tengo escamas, pero puedo nadar. ¿Qué soy?")
    print("A.Un pez volador - B.Un avión - C.Un delfín")
    opcion = input("Por favor, introduce una opción: ")

    if opcion == "A" or opcion == "a" or opcion == "C" or opcion == "c" :
        opcion_incorrecta = True
        print("Opción Incorrecta")
        puntuacion = puntuacion - 5
    elif opcion == "B" or opcion == "b":
        opcion_correcta = True
        print("Opción Correcta")
        puntuacion = puntuacion + 10
    else:
        print("Opción no reconocida")

print(f"La puntuación final son: {puntuacion}")
