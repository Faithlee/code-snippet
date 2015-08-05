@echo off
IF EXIST pack-all-min.js del /f /a /q pack-all-min.js

for %%i in (*.js) do (
	echo %%i >> packList.txt
)

for /f %%i in (packList.txt) do type %%i >> pack-all.js

java -jar D:\yuicompressor\yuicompressor-2.4.8.jar --type js --charset utf-8 pack-all.js -o pack-all-min.js

for %%i in (*.*) do (
	if not "%%~ni"=="%~n0" (
		if not "%%~ni"=="pack-all-min" del %%i
	)
)
