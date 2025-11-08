# 🏋️‍♀️ Gym Control

Sistema de gestión para gimnasios desarrollado en **PHP**, **Bootstrap** y **JavaScript**, con autenticación de usuarios y control completo de clientes, entrenadores, planes y pagos.

---

## 🚀 Descripción del proyecto

**Gym Control** es una aplicación web que permite gestionar el funcionamiento interno de un gimnasio.  
El sistema cuenta con control de acceso mediante **inicio de sesión obligatorio**, evitando que usuarios no autorizados puedan acceder.

Desde el panel principal se pueden administrar clientes, entrenadores, especialidades, planes de entrenamiento y pagos de forma eficiente y segura.

---

## ⚙️ Funcionalidades principales

### 👤 Autenticación
- Inicio de sesión con validación obligatoria.
- Contraseñas cifradas mediante **hash** para mayor seguridad.

### 🧘‍♂️ Especialidades
- Permite agregar nuevas especialidades (por ejemplo: Yoga, Spinning, CrossFit, etc.).
- Cada entrenador debe estar asociado a una especialidad existente.

### 🏋️‍♂️ Entrenadores
- Registro de entrenadores indicando su especialidad.
- No se puede crear un entrenador sin asignarle una especialidad.

### 📋 Planes de entrenamiento
- Asociación entre **profesor**, **especialidad**, **días por semana**, **precio** y **estado** (activo / sin cupo).
- Gestión del estado del plan según disponibilidad de lugares.

### 💳 Clientes
- Registro completo de datos del cliente (DNI, nombre, dirección, teléfono, correo, etc.).
- Asignación de un plan de entrenamiento al momento de la inscripción.
- Control de estado del cliente (**activo / inactivo**).

### 💰 Pagos
- Al registrar un cliente, se crea automáticamente su perfil en la sección de pagos.
- Se visualiza el **DNI**, **nombre**, **plan asignado** y **estado del pago** (pendiente / aprobado).

---

## 🛠️ Tecnologías utilizadas

- **PHP** (programación del lado del servidor)  
- **Bootstrap 5** (diseño responsivo e interfaz moderna)  
- **JavaScript** (interactividad en la interfaz)  
- **MySQL** (base de datos relacional)  

---

## 🔐 Seguridad
- Autenticación obligatoria antes de acceder al sistema.
- Contraseñas almacenadas con **hash seguro**.
- Validaciones de datos en formularios.

---

## 📂 Estructura general
/gym-control
│
├── /controladores
├── /modelos
├── /assets (Bootstrap, CSS, JS, imágenes)
├── /vistas
│ ├── login.php
| ├── usuarios.php
│ ├── clientes.php
│ ├── entrenadores.php
│ ├── especialidades.php
│ ├── planes.php
│ └── pagos.php
└── index.php

---

## 💡 Instalación y uso

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/carb17/gym-control.git
   ```
2. **Configurar la base de datos MySQL e importar el archivo .sql incluido.**

3. **Editar los datos de conexión en el archivo de configuración (por ejemplo, conexion.php).**

4. **Iniciar el servidor local (XAMPP, Laragon, etc.) y abrir:**
   ```bash
   http://localhost/gym-control/
   ```
