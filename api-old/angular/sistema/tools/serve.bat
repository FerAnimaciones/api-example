@ECHO OFF
echo ::                                                    FerAnimaciones                                                 ::
echo ::                                                       ANGULAR                                                     ::
echo ::                                                      SERVER NG                                                    ::
echo ::                                                                                                    Version: 1.0.0 ::
For /f "tokens=1-4 delims=/ " %%a in ('date /t') do (set mydate=%%c-%%a-%%b)
For /f "tokens=1-2 delims=/:" %%a in ('time /t') do (set mytime=%%a%%b)
echo %mydate%_%mytime%
cd ..
ng serve -o
