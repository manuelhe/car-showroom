car-showroom
============

Test of an Angular.js app


Project

Vitrina carros en linea.

 AngularJS
 HTML5, CSS3
 Responsive

Entregables:

 Archivos fuente de todo (no minificados)
 Imagenes
 Instrucciones breves para correr el proyecto junto con todos los archivos necesarios para el mismo


Desarrolle una vitrina de carros en línea utilizando AngularJS, HTML5, CSS3. 
Debe ser responsive, crossbrowser (Chrome, Firefox, IE9 o superior) y funcionar en Android, iPhone y iPad.

Sección Principal: muestra distintos modelos de carros con foto, modelo y año ordenado en filas y columnas (en tanto el ancho de la pantalla lo permita). 

- El despliegue y navegación queda por cuenta suya, utilice sus conocimientos de UI/UX.
- Debe tener una caja de búsqueda que permite buscar por marca y desplegar solamente los automóviles de dicha marca.
- Cada ítem(carro) puede ser seleccionado para comparación.
- Agregue un tooltip jQuery que muestre el texto “Today’s Deal” al hacer hover sobre un ítem cuya propiedad “deal” sea true. Esto solamente en la lista de la sección principal.

Seccion Detalle: Muestra los detalles de un vehículo que fue seleccionado y una imagen de mayor tamaño.

Seccion Comparativa: en esta sección se pueden comparar hasta 3 vehículos de forma que se muestren sus características y se facilite una elección por parte del usuario. Esta sección permite eliminar los vehículos seleccionados para comparación (eliminar en el widget, no de la lista general).

Widget comparativa: es una sección pequeña y no obstrusiva que permite al usuario observar en las secciones “detalle” y “principal” si hay vehículos que fueron seleccionados para comparación. Al hacer click se podrá observar dicha sección (la Sección Comparativa). Este widget debe mantener los carros que se quieren  comparar a través de las pantallas detalle y principal. Guardar la seleccion en variable de sesión, cookie o como se considere conveniente.

Panel de administración: Agregue un panel administración de carros para agregar, editar, eliminar los vehículos.

Características básicas de un vehículo:

 id
 price
 brand
 model
 year
 color
 deal: boolean

Los datos deben obtenerse a través de requests RESTful y la información puede ser almacenada en un archivo JSON.
Utilice las técnicas que conozca a discreción con el fin de demostrar su conocimiento de la herramienta.
