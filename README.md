Primer proyecto de laravel, aplicando la mayoria de las cosas que aprendi en el canal de GOGODEV.
Utilice 3 models relacionados entre si, uno se encarga de gestionar usuarios autentificados utilizando breeze, un modelo maneja los posts creados por estos mismos, ademas añadi una seccion de comentarios.
Cada usuario puede ver(estando logueado por ahora, me gustaria editar eso) los posts propios, editarlos, borrarlos, en una seccion aparte, mientras que puede navegar por los que fueron creados por otros usuarios.
Cada post tiene una seccion de comentarios, que funciona de forma reactiva con livewire, los usuarios pueden comentar en cualquier post, pueden editarlos o borrarlos, solamente sus propios comentarios por supuesto.
Por ahora este proyecto aplica los conocimientos que fui aprendiendo en las semanas que comence con laravel, autentificacion, CRUD, componentes reactivos, route::resource, etc.
Tambien estan hechas las validaciones, creo que en los comentarios todavia no.
Notas:Creo que algunas recargas funcionan de manera incorrecta, ademas no estoy convencido de utilizar tailwinds css aun, siento que genera codigo demasiado engorroso de leer.
