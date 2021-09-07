# HCNews - Sitio web de noticias
Este proyecto fué desarrollado con el framework Laravel 8, consiste en dos partes, la primera es un sitio público donde se visualizan todas las noticias publicadas, y por otra parte el panel de administrador el cual gestiona las noticias.

# Capturas

* ## Sitio público:
Home del sitio donde se visualizan las noticias publicadas recientemente.
![](docs/home.png)

En la parte superior se ven las categorías con las que cuenta el sitio, en cada una de ellas se ven las noticias o artículos correspondientes.
![](docs/sections-by-category.png)

En este apartado se muestra la noticia completa con los detalles de publicación.
![](docs/article-detail1.png)
![](docs/article-detail2.png)

Sección de comentarios, establecida en la misma página de los detalles de la noticias.
Un usuario puede escribir un comentario el cual solo tiene como requerido el mensaje; su nombre e email es opcional y que al dejarse vacio el campo de nombre el mensaje se muestra anonimo.
![](docs/comments.png)

* ## Panel administrativo

Los usuarios administradores tendrán acceso al login para acceder a gestionar su cuenta.
![](docs/login.png)

Ya dentro, se visualiza el grupo de categorías y las categorias. Los grupos de categorías contienen diversas categorías, y en este caso el gupo de categoría "Noticia" contiene diferentes categorías que son mostradas en el sitio público.
![](docs/category-category-group.png)

Apartado para dar de alta un grupo de categoría o tambien puede ser llamada como una categoría padre.
![](docs/create-category-group.png)

Edición del nombre del grupo de categorías.
![](docs/edit-category-group.png)

Apartado para dar de alta una categoría y asignación de un grupo de categoría.
![](docs/create-category.png)

Edición de la categoría.
![](docs/edit-category.png)

Apartado para la creación de una noticia o artículo.
![](docs/create-article.png)

En esta parte se ve un listado de todas las noticias que se han publicado.
![](docs/article-list.png)

Esta es una vista previa del artículo con todos los detalles y opciones para editar o eliminar.
![](docs/article-preview.png)

Apartado donde se edita la noicia y se pueden ver los comentarios con los que cuenta la misma.
![](docs/edit-article.png)

El administrador tiene la opción de dar ban a comentarios a cada artículo o de la misma forma quitar el ban.
Esta función se ve reflejada en el sitio público, donde solamente son mostrados los comentarios que no están baneados.
![](docs/ban-unban.png)

Apartado para que el administrador edite todos sus datos o pueda cambiar su contraseña.
![](docs/edit-profile.png)
