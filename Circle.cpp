
#include <stdio.h>
#include <math.h>
#include <GL/glut.h>


int xc, yc,radius;

void myDisplay(int r,int xc,int yc)
{
	int x = 0, y = r;
	float pk = (5.0 / 4.0) - r;

	/* Plot the points */
	/* Plot the first point */
	
		glBegin(GL_POINTS);
		glVertex2i(xc + x, yc + y);
		
	
//	int k;
	/* Find all vertices till x=y */
	while (x < y)
	{
		x = x + 1;
		if (pk < 0)
			pk = pk + 2 * x + 1;
		else
		{
			y = y - 1;
			pk = pk + 2 * (x - y) + 1;
		}
		glBegin(GL_POINTS);
		glVertex2i(xc + x, yc + y);
		glVertex2i(xc + x, yc - y);
		glVertex2i(xc + y, yc + x);
		glVertex2i(xc + y, yc - x);
		glVertex2i(xc - x, yc - y);
		glVertex2i(xc - y, yc - x);
		glVertex2i(xc - x, yc + y);
		glVertex2i(xc - y, yc + x);
		glEnd();
	}
	glFlush();
}






void Init()
{
	
	glClearColor(1.0, 1.0, 1.0, 0);
	
	glColor3f(0.0, 0.0, 0.0);
	
	gluOrtho2D(0, 640, 0, 480);
}

void main(int argc, char **argv)
{
	/* Initialise GLUT library */
	glutInit(&argc, argv);
	/* Set the initial display mode */
	glutInitDisplayMode(GLUT_SINGLE | GLUT_RGB);
	/* Set the initial window position and size */
	
	glutInitWindowSize(640, 480);
	/* Create the window with title "DDA_Line" */
	
	printf("ENTER FIRST POINT : \n");
	scanf_s("%d", &xc);
	printf("\nENTER SECOND POINT : \n");
	scanf_s("%d", &yc);

	

	printf("ENTER THE RADIOUS ");
	scanf_s("%d", &radius);
	myDisplay(radius,xc,yc);


	glutInitWindowPosition(0, 0);
	glutDisplayFunc(myDisplay);

	/* Initialize drawing colors */
	Init();
	/* Call the displaying function */
	
	/* Keep displaying untill the program is closed */
	glutMainLoop();
	getchar();
}