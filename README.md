# INSTALACIÓN


httpd
 ```
 <VirtualHost *:80>
  ServerName www.fullautomatizacion.cl
  #ServerAlias localhost
  DocumentRoot "C:\Users\benja\Desktop\fullautomatizacion"
  <Directory "C:\Users\benja\Desktop\fullautomatizacion">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    #AllowOverride All
    #Require local
    Order Allow,Deny
    Allow from all
    Require all granted
  </Directory>
</VirtualHost> 
```


Los simuladores responden a 

Ganaderia hace un GET ha 

http://www.fullautomatizacion.cl/controlador/cReportAlert.php

ejemplo http://www.fullautomatizacion.cl/controlador/cReportAlert.php?mensaje=se%20ha%20dectectado&asunto=Alerta

Vides hace un GET
http://www.fullautomatizacion.cl/controlador/cReportAlertaVides.php
