opcion_correcta = False

while not opcion_correcta:
    print("¿Qué es algo que puedes ver en medio de la noche y del día, pero que no puedes ver en la mañana ni en la tarde?")
    print("A.La luna - B.El sol - C.La letra 'n'")
    opcion = input("Por favor, introduce una opción: ")

    if opcion == "A" or opcion == "a" or opcion == "B" or opcion == "b" :
        print("Opción Incorrecta")
    elif opcion == "C" or opcion == "c":
        opcion_correcta = True
        print("Opción Correcta")
    else:
        print("Opción no reconocida")