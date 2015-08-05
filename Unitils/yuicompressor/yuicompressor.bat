cd "%1"
for /f %%a in ('dir /b *-min.js') do call:ProcessDel: %%a
for /f %%a in ('dir /b *-min.css') do call:ProcessDel: %%a
for /f %%a in ('dir /b *.js') do call:ProcessCompress: %%a
for /f %%a in ('dir /b *.css') do call:ProcessCompress: %%a


:ProcessDel

IF NOT [%1]==[] call:DeleteMinFiles: %1

GOTO:EOF

:ProcessCompress

IF NOT [%1]==[] call:CompressFiles: %1

GOTO:EOF

:DeleteMinFiles

IF EXIST "%CD%\%1" del "%CD%\%1"

GOTO:EOF

:CompressFiles

java -jar D:\yuicompressor\yuicompressor-2.4.8.jar %1 -o %~n1-min%~x1

GOTO:EOF