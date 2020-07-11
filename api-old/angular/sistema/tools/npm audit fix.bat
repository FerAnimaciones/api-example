@ECHO OFF
echo ::                                                       ANGULAR                                                     ::
echo ::                                               ACTUALIZANDO DEPENDENCIAS                                           ::
echo ::                                                                                                    Version: 1.0.0 ::
set baseurl=http://feranimaciones.x10.mx/ludoteca/
cd ..
cmd /c npm audit fix
PAUSE
