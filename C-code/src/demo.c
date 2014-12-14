#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int main(int argc, char **argv)
{
	int port = 0;
	printf("program begin\n");
	if (argc != 3) {
		printf("程序参数不对，正确输入方法:\n%s ip-address port\n", argv[0]);
		exit(0);
	}

	if (atoi(argv[2]) < 0 || atoi(argv[2]) > 65535 ) {
		printf("端口输入不对，应该是0-65535。默认取值3456\n");
		port = 3456;
	} else {
		port = atoi(argv[2]);
	}


	printf("命令如下: %s %s %d\n", argv[0], argv[1], port);
	return 0;
}
