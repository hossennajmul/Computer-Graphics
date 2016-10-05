#include <stdio.h> 
#include <GL/glut.h> 

int x=50,y=50,py,px;

void myDisplay(void) 
{ 
glClear(GL_COLOR_BUFFER_BIT); 
glColor3f (0.0, 0.0, 0.0); 
glPointSize(4.0); 


	bool h=false;

for (int j=0;j<8;j++)
{
	py=y;
	px=x;
	
	for(int i=0;i<8;i++)
	{
		if(j%2==0)
		{
				if(i%2==0)
			{
				glColor3f (0.0, 1.0, 0.0);
			}
			else
			{
				glColor3f (0.0, 0.0, 1.0);
				h=true;
			}
		}
		else
		{
				if(i%2==0)
			{
				
				glColor3f (0.0, 0.0, 1.0);	
			}
			else
			{
				glColor3f (0.0, 1.0, 0.0);
			}
		}
		
		
		glBegin(GL_POLYGON);
			
			glVertex2i(x+50, y);
			glVertex2i(x, y);
			glVertex2i(x, y+50);
			glVertex2i(x+50, y+50);
		glEnd(); 
		x=x+50;
		
	}
	y=py+50;
	x=px;
}
	glFlush (); 
}

void myInit (void) 
{ 
glClearColor(1.0, 1.0, 1.0, 0.0); 
glColor3f(0.0f, 0.0f, 0.0f); 
glPointSize(4.0); 
glMatrixMode(GL_PROJECTION); 
glLoadIdentity(); 
gluOrtho2D(0.0, 640.0, 0.0, 480.0); 
}

void main(int argc, char** argv) 
{ 
glutInit(&argc, argv); 
glutInitDisplayMode (GLUT_SINGLE | GLUT_RGB); 
glutInitWindowSize (640, 480); 
glutInitWindowPosition (100, 150); 
glutCreateWindow ("my first attempt"); 
glutDisplayFunc(myDisplay); 
myInit (); 
glutMainLoop(); 
} 
