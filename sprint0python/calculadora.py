from operaciones import suma, resta, multiplicacion, division

otra = True

while otra:
    n1 = int(input("Escribe el primer numero: "))
    n2 = int(input("Escribe el segundo numero: "))

    opcion = input("Que tipo de operacion quieres realizar. S=SUMA - R=RESTA - M=MULTIPLICACION - D=DIVISION: ")

    if opcion == "S":
        print(suma(n1,n2))
    elif opcion == "R":
        print(resta(n1,n2))
    elif opcion == "M":
        print(multiplicacion(n1,n2))
    elif opcion == "D":
        if n2 != 0:
            print(division(n1,n2))
        else:
            print("Error: División por cero")
    else:
        print("Opción no reconocida")
    
    operacion = input("Desea hacer otra operacion(S/N): ")

    if operacion == "N" or operacion == "n":
        otra = False
    elif operacion == "S" or operacion == "s":
        otra = True
    else:
        print("Opción no reconocida")
