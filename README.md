# Ticketing app

App per a gestionar els tickets venuts 

## base de dades
Consta de tres taules

1. Taula **usuaris**
Amb els camps:
```
id nom data_registre email telefon
```

2. Taula **events**
Amb els camps:
```
id nom data_registre data_event contrasenya
```

3. Taula **tickets**
Amb els camps:
```
id data_registre tipus id_usuari id_event
```