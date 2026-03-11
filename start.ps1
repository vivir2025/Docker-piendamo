# ==================================================
# Script de inicio para Docker - Pi\u00e9ndamo
# ==================================================

Write-Host "======================================" -ForegroundColor Cyan
Write-Host "  Sistema Pi\u00e9ndamo - Inicio Docker  " -ForegroundColor Cyan
Write-Host "======================================" -ForegroundColor Cyan
Write-Host ""

# Verificar si Docker est\u00e1 instalado
try {
    $dockerVersion = docker --version
    Write-Host "\u2705 Docker detectado: $dockerVersion" -ForegroundColor Green
} catch {
    Write-Host "\u274c ERROR: Docker no est\u00e1 instalado o no est\u00e1 en el PATH" -ForegroundColor Red
    Write-Host "   Instala Docker Desktop desde: https://www.docker.com/products/docker-desktop" -ForegroundColor Yellow
    exit 1
}

# Verificar si Docker est\u00e1 corriendo
$dockerInfo = docker info 2>&1
if ($LASTEXITCODE -ne 0) {
    Write-Host "\u274c ERROR: Docker no est\u00e1 corriendo" -ForegroundColor Red
    Write-Host "   Inicia Docker Desktop e intenta nuevamente" -ForegroundColor Yellow
    exit 1
}

# Verificar si la red compartida existe (creada por Cajib\u00edo)
$networkExists = docker network ls --filter name=ips_ips_network --format \"{{.Name}}\"
if (-not $networkExists) {
    Write-Host ""
    Write-Host "\u26a0\ufe0f  ERROR: La red Docker compartida no existe" -ForegroundColor Red
    Write-Host "   Primero debes iniciar Cajib\u00edo (hub principal) que crea la red" -ForegroundColor Yellow
    Write-Host ""
    Write-Host "   Ejecuta:" -ForegroundColor Yellow
    Write-Host "   cd C:\\docker\\cajibio" -ForegroundColor White
    Write-Host "   .\\start.ps1" -ForegroundColor White
    Write-Host ""
    exit 1
}

Write-Host ""
Write-Host "\ud83d\ude80 Iniciando contenedor de Pi\u00e9ndamo..." -ForegroundColor Yellow
Write-Host ""

# Construir e iniciar contenedor
docker-compose up -d --build

if ($LASTEXITCODE -eq 0) {
    Write-Host ""
    Write-Host "=====================================" -ForegroundColor Green
    Write-Host "  \u2705 PI\u00c9NDAMO INICIADO EXITOSAMENTE  " -ForegroundColor Green
    Write-Host "=====================================" -ForegroundColor Green
    Write-Host ""
    Write-Host "\ud83c\udf10 Accede a Pi\u00e9ndamo en:" -ForegroundColor Cyan
    Write-Host "   http://localhost/piendamo/" -ForegroundColor White
    Write-Host ""
    Write-Host "\ud83d\udcc4 Ver selector de municipios:" -ForegroundColor Yellow
    Write-Host "   http://localhost/" -ForegroundColor White
    Write-Host ""
    Write-Host "\ud83d\udcca Ver estado:" -ForegroundColor Yellow
    Write-Host "   docker-compose ps" -ForegroundColor White
    Write-Host ""
    Write-Host "\ud83d\udccb Ver logs:" -ForegroundColor Yellow
    Write-Host "   docker-compose logs -f" -ForegroundColor White
    Write-Host ""
    Write-Host "\ud83d\uded1 Detener:" -ForegroundColor Yellow
    Write-Host "   .\\stop.ps1" -ForegroundColor White
    Write-Host ""
} else {
    Write-Host ""
    Write-Host "\u274c ERROR: Hubo un problema al iniciar Docker" -ForegroundColor Red
    Write-Host "   Revisa los mensajes de error anteriores" -ForegroundColor Yellow
    Write-Host ""
    exit 1
}
    Write-Host ""
    Write-Host "🛑 Detener contenedores:" -ForegroundColor Yellow
    Write-Host "   .\stop.ps1" -ForegroundColor White
    Write-Host ""
} else {
    Write-Host ""
    Write-Host "❌ ERROR: Hubo un problema al iniciar Docker" -ForegroundColor Red
    Write-Host "   Revisa los mensajes de error anteriores" -ForegroundColor Yellow
    Write-Host ""
    exit 1
}
