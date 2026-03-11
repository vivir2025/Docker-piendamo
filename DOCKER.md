# 🐳 Sistema IPS - Dockerizado

Sistema IPS en contenedores Docker con PHP 8.0, Apache, MySQL 8.0 y phpMyAdmin.

## 📋 Requisitos Previos

- **Docker Desktop** instalado y corriendo
  - Descarga desde: https://www.docker.com/products/docker-desktop
- Windows 10/11 con WSL2 habilitado (para Docker)

## 🚀 Inicio Rápido

### 1️⃣ Exportar tu base de datos actual

Antes de la primera ejecución, necesitas exportar tu base de datos de XAMPP:

**Opción A - Usando phpMyAdmin:**
1. Abre http://localhost/phpmyadmin/ en XAMPP
2. Selecciona la base de datos `ips`
3. Ve a la pestaña "Exportar"
4. Haz clic en "Continuar"
5. Guarda como: `docker/mysql/init/01-schema.sql`

**Opción B - Usando línea de comandos:**
```powershell
C:\xampp\mysql\bin\mysqldump.exe -u root -p ips > docker\mysql\init\01-schema.sql
```

📖 Más detalles en: `docker/mysql/init/README.md`

### 2️⃣ Configurar variables de entorno (Opcional)

Si quieres cambiar las contraseñas por defecto, edita el archivo `.env`:

```env
MYSQL_ROOT_PASSWORD=tu_password_root
MYSQL_USER=ips_user
MYSQL_PASSWORD=tu_password
```

### 3️⃣ Iniciar Docker

```powershell
.\start.ps1
```

¡Eso es todo! El script automáticamente:
- ✅ Copia los archivos SQL necesarios
- ✅ Construye las imágenes Docker
- ✅ Inicia todos los contenedores
- ✅ Importa la base de datos automáticamente

## 🌐 Acceso a la Aplicación

Una vez iniciado, puedes acceder a:

| Servicio | URL | Descripción |
|----------|-----|-------------|
| **Aplicación IPS** | http://localhost/ | Sistema principal |
| **phpMyAdmin** | http://localhost/phpmyadmin/ | Gestión de base de datos |

## 🛠️ Comandos Útiles

### Iniciar contenedores
```powershell
.\start.ps1
```

### Detener contenedores
```powershell
.\stop.ps1
```

### Ver estado de contenedores
```powershell
docker-compose ps
```

### Ver logs en tiempo real
```powershell
# Todos los servicios
docker-compose logs -f

# Solo la aplicación
docker-compose logs -f app

# Solo MySQL
docker-compose logs -f db
```

### Reiniciar un servicio específico
```powershell
docker-compose restart app
```

### Acceder a la terminal de un contenedor
```powershell
# Contenedor de la aplicación
docker-compose exec app bash

# Contenedor de MySQL
docker-compose exec db bash
```

### Ejecutar comandos SQL directamente
```powershell
docker-compose exec db mysql -u ips_user -p ips
```

### Ver tablas de la base de datos
```powershell
docker-compose exec db mysql -u ips_user -p ips -e "SHOW TABLES;"
```

## 🔧 Solución de Problemas

### El puerto 80 ya está en uso
Asegúrate de que XAMPP esté detenido:
```powershell
# Detener servicios de XAMPP
net stop Apache2.4
net stop MySQL
```

### Los contenedores no inician
```powershell
# Ver logs detallados
docker-compose logs

# Reconstruir desde cero
docker-compose down -v
.\start.ps1
```

### Cambios en el código no se reflejan
El código está montado como volumen, los cambios deberían verse inmediatamente. Si no:
```powershell
docker-compose restart app
```

### Problemas de permisos en uploads/logs
```powershell
docker-compose exec app chown -R www-data:www-data /var/www/html/uploads
docker-compose exec app chown -R www-data:www-data /var/www/html/application/logs
```

### Resetear completamente (eliminar datos)
```powershell
# ⚠️ CUIDADO: Esto eliminará la base de datos
docker-compose down -v
.\start.ps1
```

## 📁 Estructura de Archivos Docker

```
ips/
├── docker/
│   ├── mysql/
│   │   └── init/              # Scripts SQL de inicialización
│   │       ├── 00-init.sql    # Crea la BD
│   │       ├── 01-schema.sql  # Tu dump (debes crearlo)
│   │       ├── 02-*.sql       # Tablas adicionales (auto)
│   │       └── 03-*.sql       # Triggers (auto)
│   ├── nginx/
│   │   ├── nginx.conf         # Config principal Nginx
│   │   └── default.conf       # Reverse proxy config
│   └── scripts/
│       └── entrypoint.sh      # Script de inicio del contenedor
├── Dockerfile                 # Imagen PHP/Apache
├── docker-compose.yml         # Orquestación de servicios
├── .env                       # Variables de entorno
├── start.ps1                  # Script de inicio
└── stop.ps1                   # Script de detención
```

## 🐳 Servicios Docker

| Servicio | Contenedor | Función |
|----------|-----------|---------|
| **nginx** | ips_nginx | Reverse proxy (puerto 80) |
| **app** | ips_app | PHP 8.0 + Apache |
| **db** | ips_mysql | MySQL 8.0 |
| **phpmyadmin** | ips_phpmyadmin | Interfaz web para MySQL |

## 💾 Persistencia de Datos

Los siguientes datos persisten entre reinicios:

- ✅ Base de datos MySQL (volumen Docker: `mysql_data`)
- ✅ Archivos subidos en `/uploads`
- ✅ Logs de aplicación en `/application/logs`

## 🔄 Actualizar la Aplicación

Los cambios en el código son inmediatos (hot reload). Para cambios en configuración:

```powershell
docker-compose restart app
```

Para cambios en Dockerfile o docker-compose.yml:

```powershell
docker-compose down
docker-compose up -d --build
```

## 📝 Notas Importantes

- ⚠️ La configuración de base de datos se cambia automáticamente a Docker al iniciar
- 💾 Los datos de MySQL persisten en volúmenes Docker (no se pierden al reiniciar)
- 🔒 Cambia las contraseñas en `.env` para producción
- 🚫 El archivo `.env` está en `.gitignore` (no se sube a Git)

## 🆘 Soporte

Si encuentras problemas:

1. Revisa los logs: `docker-compose logs`
2. Verifica que Docker esté corriendo
3. Asegúrate de que el puerto 80 esté libre
4. Revisa la documentación en `docker/mysql/init/README.md`

---

**¡Listo para desarrollar! 🚀**
