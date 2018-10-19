# Proyecto integrador agosto - diciembre 2018

## Materias

1. Ingeniería de Software II
2. Programación Web II

![](img/IMG_20181011_205402403.jpg?raw=true)

## Ámbito

Sistema de gestión para un centro de acondicionamiento físico el cual abarcará los procesos administrativos inherentes de un negocio de venta al por menor así como también el seguimiento médico y deportivo de sus clientes.

Se plantea que la arquitectura del sistema contemple tres módulos:
1. Punto de venta
2. Gestión de clases
3. Consulta, reportes y/o datos estadísticos

## Punto de venta
Las ventas al mostrador consisten en productos como agua embotellada, bebidas hidratantes, colación de frutos y semillas, suplementos alimenticios, botanas, artículos deportivos y ropa. Para lo anterior se necesita llevar el control existencias (compras) y de ventas.

Es indispensable saber quién realizó la venta así como la fecha y hora. En ocasiones, los entrenadores son quienes venden agua u otro producto, por lo que es indispensable que puedan realizar estas acciones en el sistema.

## Expediente clientes

Para el seguimiento de estado físico de los clientes se requiere tener registro de un expediente que incluya datos personales básicos, medios de contacto, talla, índice de masa corporal, composición corporal (porcentaje de grasa, masa muscular, componente de agua corporal) así como también lesiones, padecimientos o enfermedades que requieran de una consideración especial al realizar actividad física.

## Membresía

La membresía de un cliente puede ser pagada de manera mensual, semestral o anual. Pueden ser acreedores a descuentos por promociones ofrecidas por la Administración. La cuota a pagar puede variar entre clientes debido a la cantidad de sesiones (horas) o disciplinas que cada cliente desee realizar a la semana. Se busca también implementar un esquema de punchcards o tarjetas perforadas las cuales incluyan una cantidad de sesiones y que al ser tomadas por el cliente se le descuenten de su tarjeta. El pago de la membresía es indispensable para brindar el servicio por lo que se requiere de completa visibilidad del estado en que se encuentra la membresía de cada cliente.

## Programación de clases

Se requiere de un seguimiento y programación de clases por disciplina. Las disciplinas ofrecidas actualmente son Crossfit, Yoga y Spinning sin descartar la posibilidad de que la oferta de disciplinas puede variar. Cada disciplina se programa por sesiones típicamente de una hora de duración. En dicha sesión los entrenadores pueden describir la rutina de ejercicios a realizar. Se pueden calendarizar o programar rutinas con varios días de anticipación. El control de asistencia de clientes por sesión es muy importante. La rutina de ejercicios puede ser establecida a partir de un catálogo prefijado o especificada libremente por el entrenador.

Las rutinas de ejercicios pueden tener distintos niveles de esfuerzo requerido o complejidad (ejemplo principiante, intermedio, avanzado) los cuales si algún cliente no tiene la capacidad de realizar un movimiento o levantar un peso requerido puede optar por hacer su equivalente de un nivel inferior que implique un movimiento más sencillo o un peso más ligero.

Cada cliente (así como el entrenador) puede registrar el resultado de una sesión. Dicho resultado consiste en especificar el tiempo, peso o cantidad de repeticiones hechas (puede ser uno o los 3). Con los resultados de todos los clientes es posible crear un tablero de puntuaciones (listado top) para que todos tengan un punto de comparación de su desempeño y provocar una competencia sana que derive en una motivación adicional.

El cliente es capaz de revisar el historial de resultados que ha tenido en el pasado con la posibilidad de volver a realizarlos y poder así tener un punto de comparación de cómo su rendimiento ha mejorado durante el tiempo.

## Definiciones

* CrossFit. Es un régimen de entrenamiento que mezcla movimientos funcionales constantemente variados realizados en alta intensidad. Todos los ejercicios están basados en movimientos funcionales y estos a su vez reflejan los mejores aspectos de la gimnasia, levantamiento de pesas olímpico, carrera, remo y más.
* WOD (Workout Of the Day) ejercicio del día, es el conjunto de ejercicios o movimientos que se realizarán en una sesión. En muchas ocasiones WOD = sesión.
* Índice de masa corporal. Es un método utilizado para estimar la cantidad de grasa corporal que tiene una persona, y determinar por tanto si el peso está dentro del rango normal, o por el contrario, se tiene sobrepeso o delgadez.
* Composición corporal. El análisis de la composición corporal determina qué parte del cuerpo es grasa y cuál no lo es. La parte no grasa del cuerpo se llama masa magra, e incluye el músculo, agua, huesos y órganos.

Para más términos relativos a la disciplina https://greatist.com/fitness/ultimate-guide-crossfit-lingo

## Referencias
* Sitio oficial de CrossFit https://www.crossfit.com/

## Requerimientos funcionales

1. El registro de usuarios “clientes” debe ser realizada por usuarios de la administración.
2. Capacidad de modificar cualquier dato de los clientes por usuarios de la administración.
3. Los clientes pueden complementar su perfil o expediente, incluso agregar fotografías (al menos una imagen de perfil o avatar)
4. Administración de cualquier colección de datos (catálogos). Ejemplo artículos a la venta, gastos de la administración, clientes, promociones, rutinas, horarios, medidas, etc.
5. Los usuarios de la administración pueden registrar el pago o venta de los productos o servicios.
6. Recordatorio de fechas de pagos a clientes.
7. Envío de mensajes o notas importantes a todos los participantes de una disciplina. Ejemplo “El día sábado 20 la actividad se realizará en la playa a las 7:00 am.”
8. Consulta de clientes activos (¿asistencias?) en un periodo de tiempo.
9. Consulta del expediente médico y/o rendimiento deportivo de un cliente.
10. La asistencia de un cliente a una sesión puede ser registrada por el mismo cliente o por cualquier entrenador.
11. El entrenador puede programar de antemano las sesiones, agregando texto, imágenes e incluso videos (youtube, vimeo, etc.) a la explicación de la rutina.
12. Un cliente puede indicar que asistirá a una sesión futura (apartar). Esto se tomará como asistencia del cliente a dicha sesión a menos que un entrenador indique lo contrario.
13. Estado de resultados de los ingresos y egresos en un periodo de tiempo.
14. Manejo de logros, trofeos o medallas para los clientes, ejemplo una medalla al registrar 50, 100, 300, etc. sesiones acumuladas o consecutivas; superar un record personal, realizar por primera vez un movimiento, acudir al menos a tres horarios distintos, cumplir metas de pérdida de medidas de talla o peso, etc.
15. Capacidad de los clientes para visualizar el perfil o expediente de otros clientes. Dicha consulta deberá limitarse al nombre, correo y fotografía así como los logros/medallas/trofeos alcanzados por dicho cliente.

## Requerimientos no funcionales.

1. Tener una interfaz web simple con un nivel de complejidad bajo el cual sea capaz de ser utilizado por personas con poca experiencia en el uso de e-mail, redes sociales o portales de noticias.
2. Contar con mecanismos de seguridad que prevengan exposición indeseada de datos sensibles de personas o propios del negocio. Prevenir puertas traseras que permitan la manipulación de la información.
3. Manejo de la validez o caducidad de sesiones de usuario de la administración (principalmente).
4. Acceso de usuarios utilizando dirección de correo electrónico personal (único en todo el sistema) y contraseña.
5. Recuperación y cambio de contraseñas de usuarios.
6. Contraseñas de usuarios con al menos 6 caracteres de longitud.
7. El sistema debe ser capaz de adaptarse a ser utilizado desde un dispositivo móvil (teléfono o tableta)
8. Definir o limitar el acceso a las funcionalidades de usuarios de la administración a través de roles o perfiles.
9. Contar con los colores y logotipo del negocio.
10. Mantener la sesión abierta de un usuario que haya ingresado al sistema, con la finalidad de simplificar su uso.
11. El sistema debe presentar la respuesta máximo un segundo y medio después de la solicitud.
12. Cada registro o actualización de información deberá ser acompañada del usuario, fecha, hora en la que sucedió el evento.
