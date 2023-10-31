# Importamos las funciones de operaciones desde el módulo operaciones
from operaciones import suma, resta, multiplicacion, division
# Inicializamos la variable para controlar si se realiza otra operación
otra = True
# Mientras el usuario quiera realizar otra operación, seguimos pidiendo números y realizando operaciones
while otra:
    # Pedimos al usuario que introduzca dos números
    n1 = int(input("Escribe el primer numero: "))
    n2 = int(input("Escribe el segundo numero: "))
    # Pedimos al usuario que elija la operación a realizar
    opcion = input("Que tipo de operacion quieres realizar. S=SUMA - R=RESTA - M=MULTIPLICACION - D=DIVISION: ")
    # Dependiendo de la opción elegida, realizamos la operación correspondiente
    if opcion == "S":
        print(suma(n1,n2))
    elif opcion == "R":
        print(resta(n1,n2))
    elif opcion == "M":
        print(multiplicacion(n1,n2))
    elif opcion == "D":
        # En caso de división, comprobamos que el divisor no sea cero para evitar errores
        if n2 != 0:
            print(division(n1,n2))
        else:
            print("Error: División por cero")
    else:
        print("Opción no reconocida")
    # Preguntamos al usuario si quiere realizar otra operación
    operacion = input("Desea hacer otra operacion(S/N): ")
    # Si el usuario no quiere hacer otra operación, salimos del bucle
    if operacion == "N" or operacion == "n":
        otra = False
    elif operacion == "S" or operacion == "s":
        otra = True
    else:
        print("Opción no reconocida")
