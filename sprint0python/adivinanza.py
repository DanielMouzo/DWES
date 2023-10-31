import random
# Inicializamos las variables de control
opcion_correcta = False
opcion_incorrecta = False
puntuacion = 0


# Lista de adivinanzas
adivinanzas = [
    {
        "pregunta": "¿Qué es algo que puedes ver en medio de la noche y del día, pero que no puedes ver en la mañana ni en la tarde?",
        "opciones": {"A": "La luna", "B": "El sol", "C": "La letra 'n'"},
        "respuesta_correcta": "C"
    },
    {
        "pregunta": "Soy un animal que vuela sin alas, corro sin patas y lloro sin ojos. ¿Qué soy?",
        "opciones": {"A": "Un pez", "B": "El viento", "C": "Un árbol"},
        "respuesta_correcta": "B"
    },
    {
        "pregunta": "No soy un pájaro, pero puedo volar; no tengo escamas, pero puedo nadar. ¿Qué soy?",
        "opciones": {"A": "Un pez volador", "B": "Un avión", "C": "Un delfín"},
        "respuesta_correcta": "B"
    }
]

# Seleccionar dos adivinanzas aleatoriamente
adivinanzas_seleccionadas = random.sample(adivinanzas, 2)
# Para cada adivinanza seleccionada
for adivinanza in adivinanzas_seleccionadas:
    opcion_correcta = False
    opcion_incorrecta = False
    # Mientras no se haya seleccionado una opción correcta o incorrecta
    while not (opcion_correcta or opcion_incorrecta):
        # Imprimimos la pregunta y las opciones de respuesta
        print(adivinanza["pregunta"])
        # La key se refiere a este caso al valor asociado en el diccionario: "pregunta","opciones" y "respuesta_correcta"
        for key, value in adivinanza["opciones"].items():
            print(f"{key}.{value}")
        # Pedimos al usuario que elija una opción
        opcion = input("Por favor, introduce una opción: ")
        # Comprobamos si la opción elegida es correcta
        if opcion.upper() == adivinanza.get("respuesta_correcta"):
            opcion_correcta = True
            print("Opción Correcta")
            puntuacion += 10
        else:
            # Si la opción elegida no es correcta, restamos puntos y pasamos a la siguiente pregunta
            opcion_incorrecta = True
            print("Opción Incorrecta")
            puntuacion -= 5
# Al final del juego, mostramos la puntuación final del usuario
print(f"La puntuación final es: {puntuacion}")