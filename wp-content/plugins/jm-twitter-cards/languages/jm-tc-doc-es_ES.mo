��    �      t  �   �      �  g   �  ^   1  Z   �  i   �  �   U  #     R   )  �   |  	   ;  �   E     �     �     �  j     E   y  _   �  �     M     :   c  �   �  W  �  B  �     0  K   F  \   �  o   �     _  E   m     �  �   �     �     �     �     �  f   �     +     :     H     ]     z     �  �   �     /  O   G  ;   �    �     �  &        (  $   A     f  9   �  �  �  �   �  ^   Q   m   �   W   !  �   v!  �   :"     �"  �   �"  y   �#      9$  D   Z$    �$  _   �%  i   &  s   w&     �&     �&     '     '  �   %'  D   �'  s   A(     �(     �(     �(     �(     �(     �(  >   )  ,   G)     t)     x)  :   �)  �   �)     �*     �*     �*     �*     �*     �*  ^   �*  �  =+  7    -  <   8-  �   u-  ,   f.  &   �.  $   �.  �  �.  9   �0  0   �0  �   
1  �   �1  9   w2  9   �2    �2  }   �3  �   }4  c  h5     �6  V   �6  �   37  R   �7     >8  &   T8  ]  {8  3   �9     :    ):  �   =;  l   �;     b<  C   j<  e  �<  v   >     �>     �>    �>  �  �?  r   �B  �   C  U   �C     D     D  /   D  n  LD  x   �E  o   4F  d   �F  �   	G  �   �G  0   |H  d   �H  �   I  	   �I  �   �I     �J     �J     �J  {   �J  Q   ]K  |   �K    ,L  U   JM  K   �M    �M  �  
O  �  �P     �S  X   �S  g   T  �   iT     �T  X    U     YU  �   fU     YV     vV     �V     �V  e   �V     W     W     ,W      @W     aW     sW  �   {W     OX  e   gX  G   �X  v  Y     �Z  0   �Z     �Z  +   �Z  %   "[  ;   H[  �  �[  �   w]  a   a^  |   �^  `   @_  �   �_  �   {`  	   Fa    Pa  �   gb  "   �b  _   c  D  nc  g   �d  z   e  ~   �e  	   f     f     8f     Tf    gf  _   |g  }   �g     Zh     lh     �h     �h      �h     �h  J   �h  ;   +i     gi     ki  Z   �i  �   �i     �j     �j     �j     �j     �j     k  l   k    �k  H   �m  E   �m    2n  3   Ro  ,   �o  -   �o    �o  9   �q  E   #r  �   ir  �   Ws  O   %t  V   ut  X  �t  �   %v  &  �v  �  �w     �y  a   �y  �   �y  y   �z     i{  %   �{  �  �{  <   W}  )   �}  ;  �}  �   �~  �   �     f�  N   r�  �  ��     ��     �     1�  F  K�  G  ��  p   ڇ  �   K�  k   #�     ��     ��  2   ��         1   V   �   e   /       r   _   d   '   N      Y   l   c   \   j   t       6      U   
   [                  8   E              -              &   g       f   v      P      k   �      	   n   <       q           s         ;   9   I       �   0       =                  �          }   X   p          ,             "           T       O            a       D   w   �   W       �          H               F       `       �       y       u   �   ^      +   b           !       z       M   Z   @   �   S                 A   >   Q   �   *      #   5   :   x       o   B   (   |      ]   .   C           $   %       3   �   ~       {                     G       2      L       i       J       �      ?   K   h   7   )   4   m   R       <strong>Image options</strong> : This is optional but some users wanted alternatives for featured image <strong>Mobile (non-retina displays)</strong>: maximum height of 375px, maximum width of 280px <strong>Mobile (retina displays)</strong>: maximum height of 750px, maximum width of 560px <strong>Product card options</strong> : You can set 2 key details for your product (e.g price, size, etc) <strong>Retina display</strong>: Be careful with Retina displays, image must be tall enough. Also make sure your image is not heavier than 1 MB if used for summary large cards A few simple rules for Player Cards Almost the same card as Summary Card but with a large image. It is nice, isn't it? Also be sure to check all the following point before <a href= "https://dev.twitter.com/docs/cards/validation/validator">asking for approval</a>. Here are the common issues with player cards: Analytics And if you do not use one of this two plugins you can use your own custom fields instead. Just provide meta keys (advanced users). App Installs App Installs and Deep-Linking App install & Deep Linking Attach additional interactivity outside the video or audio player (e.g., non-standard buttons or banners). Automatically play content that is greater than 10 seconds in length. Basically you provide your custom field keys in plugin option page and then it will grab datas. Be careful the key you have to provide MUST BE the key your theme use to set the Twitter's field in profile ! In addition to this, THE VALUE MUST BE A USERNAME not a URL such as http://twitter.com/user <strong>it could break the cards !</strong> Be careful with this. Manipulating markup in head section is quite sensitive. Be careful, it is not available in all countries ! Not yet Build a responsive and equivalent experience that works within all Twitter clients (including twitter.com, mobile.twitter.com, Twitter for iPhone and Twitter for Android). Cards that do not work in all Twitter clients listed will not be approved. Build end-to-end interactive experiences inside the video or audio player unrelated to Player Card content, such as the following: purchasing, gaming, polling, messaging, and data entry. Instead, build these interactive experiences with our other Card types or enhance your Player Card content with links to your website or mobile application. By adding these new footer tags to your markup, you'll be able to specify downloads for users who've not yet installed your app on their device. This will work across iPhone, iPad, and Android (Google Play). Please note that if you have an iPhone app, but no iPad-optimized app, you should include the iPhone app id, name, and url for both iPhone and iPad-related tags. When no value is provided, the Cards will simply render a "View on web" link pointing to website of the card. Below is an example of what the prompt will look like if the user does not have the app installed: Can I filter markup ? Check if the player's z-index causes the content to overlap the page header Check that image does not exceed 1mb in size and/or is compatible with Twitter requirements. Circumvent the intended use of the Card. Player Cards are reserved for linear audio and video consumption only. Common Issues Content greater than 10 seconds in length must not play automatically Deep-Linking Default to &#226;&#8364;&#732;sound off&#226;&#8364;&#8482; for videos that automatically play content. Please note that videos greater than 10 seconds in length must not automatically play content. Different type of cards Different types of cards Do not: Do: Don't panic ! It's probably you did not set your robots.txt file according to Twitter's recommandation Extra settings Extrasettings Follow me on Twitter French blogger and developer Gallery cards General Generate active mixed content browser warnings at any point during the audio or video experience, either on load or during play. For more information, see the Go To Table of Contents Here I disable Twitter Cards for both page with ID 19 and page slug 'contact' : Here I disable Twitter Cards for post with format 'status': Here is example markup to enable app install prompts and deep-linking, and note that this metadata can be appended to any card type. Additionally the App ID value for iPhone and iPad should be the numeric App Store ID, while the App ID for Google Play should be the Android package name: Home settings How do I use the custom fields option? How to get Twitter Cards I do not see all options in meta box I do not see images in tweets ! I want to disable Twitter Card Markup in particular cases If a user does have the application installed, you can specify a deep-link into the correlated resource within your own application. When a user clicks on the "Open in app" tap target, Twitter will send that user out into your application. This value is specified in the "twitter:app:name:(iphone|ipad|googleplay)" tags. The app url should be your app-specific URL Scheme (requires registration within your app) that launches your app on the appropriate client. If home page is posts page (which is often the case), this setting allows you to define a Twitter Card title and description. This prevent from getting the datas from the first post in the loop. If the browser asks you whether you want to display insecure assets, you have an https problem If the media player includes sharing to third-party networks, you must provide an option to share to Twitter. If you experience any issue or if you mess with this option just recover with the key : If you have any issue, the first thing you have to do is to go to <a class= "button button-secondary" href= "https://dev.twitter.com/docs/cards/troubleshooting">Twitter Cards troubleshooting</a>. If you select photo, or summary large image or product cards then (<strong>save draft</strong> if JavaScript is disabled) you'll see additional fields you can set such as : Images In 3.3.6 Plugin UI has been renewed with some flat design and in a simpler way. Only option and all explanations in documentation. All sections includind meta box on post edit has now a link to documentation. In Android/iOS browsers the experience must fall back gracefully (sized for mobile viewport, no broken Flash embeds, etc) JM Twitter Cards - Documentation Just select card type. You will see additional fields if they exist. Last setting is for multi-author blogs. It allows your authors to get an additional field in their profile. They can provide their Twitter Account. This is meant to improve authorship. If they publish a post, their twitter usernames will be set as twitter meta creator. Link to a HTML page which falls back to mobile friendly content in case Flash is not available. Make sure the image is at least 68,600 pixels (a 262x262 square image, or a 350x196 16:9 image) or bigger Mark your Card as &#226;&#8364;&#732;true&#226;&#8364;&#8482; for sensitive media if such media could be displayed. Meta Box Meta Box setting Meta tag references My Wishlist Note: The product card requires an image of size 160 x 160 or greater. It prefers a square image but we can crop/resize oddly shaped images to fit as long as both dimensions are greater than or equal to 160 pixels. Once it's activated you'll get a custom meta box in your post edit : Once you have added the specific markup with plugin <strong>do not forget to validate your website on dev.twitter : Photo cards Player cards Plugin options Plugin settings Preview tool Product cards Provide a raw stream to video and audio content when possible. Require users to sign-in to your experience. SEO See on dev.twitter.com Set twitter:player to point directly at a .swf movie file. Since 3.3.4 there is a new setting that allows you to use your own field for Twitter's field in profiles. A lot of theme have this feature so you probably want to keep only one field. Source Sources Sources and Credits Summary Large Image cards Summary cards Table of content Test your experience on the native browsers of Twitter clients before submitting for approval. The Gallery Card allows you to represent collections of photos within a Tweet. This Card type is designed to let the user know that there's more than just a single image at the URL shared, but rather a gallery of related images. You can specify up to 4 different images to show in the gallery card via the twitter:image[0-3] tags. You can also provide attribution to the photographer of the gallery by specifying the value of the twitter:creator tag. The HTTPS lock is showing active mixed content warnings The Photo Card puts the image front and center in the Tweet: The Product Card is a great way to represent retail items on Twitter, and to drive sales. This Card type is designed to showcase your products via an image, a description, and allow you to highlight two other key details about your product. The content must have stop or pause controls The content must not be entirely an ad The content must not require sign-in The image <strong>must not be more than 1mb in size</strong> that is why the custom Meta Box includes a checking system that assess your image size and display the result on each post edit. If you do not use cutom meta box be sure to upload image smaller than 1mb in size. If your image is heavier, your card will not break because meta image is not required for summary and summary large image cards but no image will be displayed in your tweets. The player URL is not HTTPS (did we mention this before?) The player URL must not point directly to a .swf These fields are strings and can be used to show the price, list availability, list sizes, etc. This will require adding some new markup tags to your pages, which we will cover below. This card requires <strong>a minimum width of 280, and a minimum height of 150</strong>, the same requirement as Photo cards, that is why it's the smallest size used by the plugin. This could be another way to disable cards on some pages. This file is used to set specific rules for web crawlers. This is meant to let the user know that there is more than just a single image at the URL shared, but rather a gallery of related images. So these images have to be part of a WordPress gallery. Please ensure you use the shortcode [gallery] in your post to enjoy Gallery cards This is one of the best features of the plugin. It allows to customize your cards for each post and you get extra features... This is the first section. You can set which type of card will be the default type used in your website. You must define twitter card creator (username) and twitter card site (username). If they are the same just enter username twice. This new feature allows a fine set up for Twitter Cards Experience. You can analyse your tweets and see what works and what fails. You can also check which card type fits your content.<br /> In a nutshell you can improve your Twitter engagement, monitor clicks and retweets and see what is the best experience for your followers. <strong>AMAZING</strong>! To GET STARTED: To activate this mode you have to activate the <a href="#metabox">custom meta box</a>. To define a photo card experience, set your card type to "photo" and provide a twitter:image. Twitter will resize images, maintaining original aspect ratio to fit the following sizes: To use new feature (in 3.3.6) Gallery cards, just use the WordPress Gallery System Troubleshooting Guide Twitter Card Validator does not work ! Twitter Cards allow you to attach rich media experiences to Tweets about your content; Twitter Card analytics gives you related insights into how your content is being shared on Twitter. Through personalized data and best practices,Twitter Card analytics reveals how you can improve key metrics such as URL clicks, app install attempts and Retweets. Twitter card validator does not work with my site ! Twitter cards documentation Twitter cards make it possible for you to attach media experiences to Tweets that link to your content. Simply add a few lines of HTML to your webpages, and users who Tweet links to your content will have a "card" added to the Tweet that is visible to all of their followers. Twitter will not create a photo card unless the twitter:image is of a minimum size of 280px wide by 150px tall. Images will not be cropped unless they have an exceptional aspect ratio Twitter's bot needs to have access to your website to fetch your content, so just insert this in the file :: Updated Use HTTPS for your iframe, stream, and all assets within your Card. Use the dropdown menu to choose which size you want to set by default (you can override this with the metabox fields). You can now choose (3.3.0) to force crop or not. Do not forget to enter a fallback image in case no option is set. You can also set twitter image with and height to get a better control of cards display (only for photo and product cards). Use wmode=opaque if utilizing Flash for the twitter.com experience, so that the player renders at the correct z-index. Validation form What are Twitter Cards? With version 3.3.1 the plugin allows you to dismiss metabox if you do not want or need to use it. This introduces more flexibility for users who do not need to use metabox on each post. If option is set to "yes, please deactivate it", the datas will be set by general options. WordPress is great but we often need to add some SEO plugins such as <a href= "http://yoast.com/wordpress/seo/">WP SEO by Yoast</a> or <a href= "http://wordpress.org/plugins/all-in-one-seo-pack/">All In One SEO</a>. These plugins are very very popular and you can find them in a lot of WP installations. JM Twitter Cards checks if one of the two plugins is activated and grabs meta title and description you have set. This allows you not to waste your time writting things twice for each post. If you forget to fulfill SEO fields do not panic, there are fallback (post title and the first words of your post as description). Do not forget to choose how many words the plugin has to grab for twitter meta description(max 200). Yes, it's now possible with 3.9, you just have to make you own function and "hook" it on <code>jmtc_markup</code>  You can also set how many words the plugin has to grab to set a description by default. This allows to avoid empty twitter meta description which often breaks twitter cards. You can use the following snippet in your functions.php or in a functionality plugin. by for maximum height of 375px, maximum width of 435px Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Project-Id-Version: JM Twitter Cards Documentation
POT-Creation-Date: 
PO-Revision-Date: 
Last-Translator: jelena kovacevic <jecajeca260@gmail.com>
Language-Team: jmlapam <contact@tweetpress.fr>
MIME-Version: 1.0
X-Generator: Poedit 1.5.5
Plural-Forms: nplurals=2; plural=(n > 1);
Language: fr
 <strong> opciones de imagen </strong>: Esto es opcional, pero algunos usuarios querían alternativas para Foto principal <strong> Móvil (pantallas que no sean de retina) </strong>: altura máxima de 375px, el ancho máximo de 280px <strong> Móvil ( pantallas de retina) </strong>: altura máxima de 750px, el ancho máximo de 560px <strong> opciones tarjeta de producto </strong>: Permite determinar 2 detalles clave de su producto (por ejemplo, precio, tamaño, etc.) <strong> pantalla Retina </strong>: Tenga cuidado con las pantallas de Retina, la imagen debe ser lo suficientemente alta. También asegúrese de que su imagen no es más pesada que 1 MB si se utiliza para grandes tarjetas de resumen Algunas reglas simples para Tarjetas Reproductor Casi la misma tarjeta como tarjeta de resumen, pero con una imagen de gran tamaño. Es bonita, ¿no? También asegúrese de revisar todos los puntos siguientes antes <a href= "https://dev.twitter.com/docs/cards/validation/validator"> pidiendo aprobación </un>. Estos son los problemas comunes con tarjetas de reproductor: Analitico Y si usted no usa uno de estos dos plugins puede utilizar sus propios campos personalizados en su lugar. Simplemente proporcione teclas meta (usuarios avanzados). App Installs App Installs y Deep-Linking App install & Deep Linking Adjunte interactividad adicional fuera del reproductor de audio o video (por ejemplo, los botones no estándar o banderas). Reproduzca automáticamente contenido que tiene más de 10 segundos de duración. Básicamente usted proporciona sus claves de campos personalizados en la página de opción del plugin y luego agarra datos. Tenga cuidado, ¡la clave que tiene que proporcionar debe ser la clave que su tema usa para establecer el campo de Twitter en el perfil! Además de esto, EL VALOR DEBE SER UN NOMBRE DE USUARIO, no un enlace como http://twitter.com/user <strong> ¡podría romper las tarjetas! </strong> Tenga cuidado con esto. Manipular marcado en sección del encabezado es muy sensible. Tenga cuidado, ¡aún no está disponible en todos los países! Todavía no Construya una experiencia sensible y equivalente que trabaja dentro de todos los clientes de Twitter (twitter.com incluyendo, mobile.twitter.com, Twitter para iPhone y Twitter para Android). Las tarjetas que no funcionan en todos los clientes de Twitter enumerados no serán aprobadas. Construya experiencias interactivas dentro del reproductor de vídeo o de audio no relacionado con el contenido de la Tarjeta de Reproductor, tales como las  Compras, juegos de azar, la votación, mensajería y datos de entrada. En su lugar, construya estas experiencias interactivas con nuestros otros tipos de tarjetas, o mejore su Tarjeta de Reproductor con enlaces a su sitio web o aplicación móvil. Mediante la adición de estas nuevas etiquetas de pie de página a su marcado, usted será capaz de especificar descargas para los usuarios que no han todavía instalado su aplicación en su dispositivo. Esto funciona a través de iPhone, iPad y Android (Google Play). Por favor, tenga en cuenta que si usted tiene una aplicación para el iPhone, pero sin aplicación optimizada para iPad, usted debe incluir el ID de iPhone App, nombre y url para iPhone y etiquetas relacionadas con el iPad. Cuando no se proporciona ningún valor, las tarjetas simplemente harán un enlace "Ver en la web" que apunta a la página web de la tarjeta. A continuación se muestra un ejemplo de cómo se verá el símbolo si el usuario no tiene la aplicación instalada: ¿Puedo filtrar marcado? Compruebe si z-index del jugador hace que el contenido cubra el encabezado de la página Compruebe que la imagen no exceda de 1 MB de tamaño y / o es compatible con los requisitos de Twitter. Eludir el uso previsto de la Tarjeta. Tarjetas del Reproductor están reservadas para audio lineal y el consumo de vídeo solamente. Problemas comunes Contenido de más de 10 segundos de duración, no debe reproducirse de forma automática Deep-Linking Por defecto a &#226;&#8364;&#732; sonido y off&#226;&#8364;&#8482; videos que reproducen automáticamente el contenido. Tenga en cuenta que los videos de más de 10 segundos de duración, no deben reproducir de forma automática el contenido. Diferentes tipos de tarjetas Diferentes tipos de tarjetas No: Hacer: ¡No se asuste! Probablemente no ha configurado su archivo robots.txt según recomandacion de Twitter Ajustes adicionales Ajustes adicionales Sígueme en Twitter Blogger Francés y desarrollador Tarjetas Galería General Genera avisos del navegador de contenido mixto activas en cualquier momento durante el audio o la experiencia de vídeo, ya sea en la carga o durante la reproducción. Para obtener más información, consulte la Ir a Tabla de Contenido Aquí desactivo Tarjetas Twitter tanto para la página con ID 19 y “contacto” slug de la página: Aquí desactivo Tarjetas Twitter para publicaión con 'status' Formato: Aquí está un ejemplo de marcado para permitir la instalación de aplicación y deep-linking, y tenga en cuenta que estos metadatos se pueden añadir a cualquier tipo de tarjeta. Además, el valor de ID de la aplicación para iPhone y iPad debe ser el ID numérico de la App Store, mientras que la ID de la aplicación de Google Play debe ser el nombre del paquete Android: Página de Inicio de ajustes ¿Cómo uso la opción de campos personalizados? Como obtener Twitter Cards? No veo todas las opciones en el cuadro meta ¡No veo las imágenes en los tweets! Quiero desactivar Twitter Card Markup en casos particulares Si un usuario tiene instalada la aplicación, se puede especificar un deep-link en el recurso correlacionado dentro de su propia aplicación. Cuando un usuario hace clic en "Abrir en una app", Twitter enviará ese usuario a su aplicación. Este valor se especifica en la etiqueta "twitter:app:name:(iphone|ipad|googleplay)". La url de la aplicación debe ser su esquema URL específica de la aplicación (requiere registro dentro de su app) que pone en marcha su aplicación en el cliente adecuado. Si la página principal es la página de publicaciones (que suele ser el caso), este ajuste le permite definir título y descripción de una tarjeta de Twitter. Esto impide recibir los datos desde la primera publicación en el bucle. Si el navegador le pregunta si desea mostrar los activos inseguros, usted tiene un problema https Si el reproductor multimedia incluye compartir a redes de terceros, debe proporcionar una opción para compartir con Twitter Si experimenta cualquier problema o si te metes con esta opción sólo se recupera con la clave: Si usted tiene cualquier problema, lo primero que tienes que hacer es ir a <a class= "button button-secondary" href= "https://dev.twitter.com/docs/cards/troubleshooting">solución de problemas de TarjetasTwitter </a>. Si selecciona la foto o una imagen grande o fichas de producto entonces (<strong> guardar el proyecto </strong> si javascript está deshabilitado) verá los campos adicionales que puede configurar como: Imágenes En Plugin 3.3.6 la IU se ha renovado con un poco de diseño plano y de una manera más simple. Sólo una opción y todas las explicaciones en la documentación. Todas las secciones incluyendo el cuadro de meta en el poste de edición tienen ahora un enlace a la documentación-. En navegadores Android / iOS la experiencia debe caer con gracia (tamaño para ventana móvil, no incrustaciones Flash rotas, etc.) JM Twitter Cards  - Documentación Sólo tiene que seleccionar el tipo de tarjeta. Usted verá los campos adicionales, si existen. La última configuración es para los blogs de varios autores. Permite a los autores obtener un campo adicional en su perfil. Pueden proporcionar su cuenta de Twitter. Esto tiene por objeto mejorar la autoría. Si ellos publican una publicación, sus nombres de usuario de Twitter se establecerán como creador meta Twitter. Enlace a una página HTML que cae de nuevo a contenido móvil en caso de que Flash no esté disponible. Asegúrese de que la imagen es de al menos 68.600 píxeles (una imagen cuadrada 262x262, o una imagen350x196 16:9) o mayor Marque su tarjeta como &#226;&#8364;&#732;true&#226;&#8364;&#8482; para medios sensibles si se pudieran mostrar dichos medios. Meta Caja Configuración Meta Caja Referencias a etiqueta Meta Mi Lista de Deseos Nota: La tarjeta de producto requiere una imagen de tamaño 160 x 160 o mayor. Prefiere una imagen cuadrada pero podemos recortar / cambiar el tamaño de las imágenes con formas extrañas para adaptarse siempre que ambas dimensiones sean mayores que o iguales a 160 píxeles. Una vez que se activa obtendrá un cuadro de meta personalizado en tu edición de publicación: Una vez que haya añadido el marcado específico con el plugin <strong> no se olvide de validar su sitio web en dev.twitter : Tarjetas de Fotos Tarjetas de reproductor Opciones plugin Configuración Plugin Herramienta de Previsualización Tarjetas deProductos Proporcionar un flujo raw a contenido de vídeo y audio cuando sea posible Requerir que los usuarios inicien sesión en tu experiencia SEO Ver en dev.twitter.com Establecer el reproductor Twitter para apuntar directamente a un archivo de película swf. Desde 3.3.4 hay una nueva opción que permite que usted utilice su propio campo para el campo de Twitter en los perfiles. Muchos temas tienen esta característica por lo que probablemente quiere mantener un solo campo. Fuente Fuentes Fuentes y Créditos Resumen tarjetas Imagen Grande Tarjetas Resumen Tabla de contenido Pruebe su experiencia en los navegadores nativos de clientes de Twitter antes de enviar para su aprobación. La Tarjeta de Galería le permite representar colecciones de fotos dentro de un Tweet. Este tipo de tarjeta está diseñada para que el usuario sepa que hay más que una sola imagen en la dirección URL compartida, sino más bien una galería de imágenes relacionadas. Puede especificar hasta 4 imágenes diferentes para mostrar en la tarjeta de la galería a través de Twitter: etiquetas de imagen [0-3]. También puede proporcionar la atribución al fotógrafo de la galería, especificando el valor de la etiqueta Twitter:creator. El bloqueo HTTPS está mostrando advertencias de contenido mixto activos La Tarjeta de Fotos pone la imagen al frente y al centro en el Tweet: La Tarjeta de Producto es una gran manera de representar artículos en venta en Twitter, y para impulsar las ventas. Este tipo de tarjeta está diseñada para mostrar sus productos a través de una imagen, una descripción, y permitirá resaltar otros dos detalles claves de su producto. El contenido debe tener controles de parada o pausa El contenido no debe ser del todo un anuncio El contenido no debe requerir Iniciar sesión La imagen <strong> no debe ser de más de 1 MB de tamaño </strong> es por eso que la Meta caja personalizada incluye un sistema de control que evalúa su tamaño de la imagen y muestra el resultado en cada edición de publicación. Si usted no utiliza la caja meta personalizada asegúrese de cargar una imagen menor de 1 mb de tamaño. Si su imagen es más pesada, su tarjeta no se romperá porque la imagen meta no se requiere para resumen y tarjetas de resumen grandes, pero no la imagen se mostrará en sus tweets. La URL jugador no es HTTPS (¿le hemos dicho esto antes?) La URL del reproductor no debe apuntar directamente a un archivo. swf Estos campos son cadenas y se pueden utilizar para mostrar los precios, la disponibilidad, la lista de tamaños, etc. Esto requerirá la adición de algunas nuevas etiquetas de formato a sus páginas, lo que vamos a cubrir más adelante. Esta tarjeta requiere <strong> una anchura mínima de 280 y una altura mínima de 150 </strong>, el mismo requisito que tarjetas de foto, es por eso que es el tamaño más pequeño utilizado por el plugin. Esto podría ser otra manera de desactivar las tarjetas sobre algunas páginas. Este archivo se utiliza para establecer normas específicas para los rastreadores web. Esto se hace para que el usuario sepa que hay más que una sola imagen en la dirección URL compartida, sino más bien una galería de imágenes relacionadas. Así pues, estas imágenes tienen que ser parte de una galería de WordPress. Por favor, asegúrese de usar el código corto [galería] en su publicación para gozar de tarjetas Gallery Esta es una de las mejores características del plugin. Permite personalizar sus tarjetas para cada publicación y obtiene características adicionales ... Esta es la primera sección. Puede configurar qué tipo de tarjeta será el tipo por defecto que se utiliza en su sitio web. Debe definir creador de tarjeta twitter (nombre de usuario) y el sitio de tarjeta Twitter (nombre de usuario). Si son la misma, introduce dos veces el nombre de usuario. Esta nueva característica permite un ajuste fino para Twitter Cards Experience. Usted puede analizar sus tweets y ver lo que funciona y lo que falla. También puede comprobar qué tipo de tarjeta se ajusta a su contenido. <br /> En pocas palabras usted puede mejorar su participación Twitter, supervisar los clics y retweets y ver cuál es la mejor experiencia para sus seguidores. ¡<strong> SORPRENDENTE </strong>! PARA COMENZAR: Para activar este modo usted tiene que activar el <a href="#metabox"> caja meta personalizada</a> Para definir una experiencia de tarjeta de foto, ponga su tipo de tarjeta a "foto" y proporcione una imagen twitter. Twitter redimensionará las imágenes, manteniendo la relación de aspecto original para ajustarlo a los siguientes tamaños: Para utilizar la nueva característica (en 3.3.6) tarjetas Gallery, sólo tiene que utilizar el Sistema WordPress Gallery Guía de Solución de problemas ¡Twitter Card Validator no funciona! Tarjetas Twitter permiten conectar experiencias ricas de medios a los tweets acerca de su contenido; los análisis Twitter Card le dan ideas afines sobre cómo se está compartiendo su contenido en Twitter.A través de datos personalizados y las mejores prácticas, análisis Twitter Card revela cómo usted puede mejorar las métricas de clave, tales como clics en URL, intentos de instalación de aplicaciones y Retweets. ¡El Validador de Tarjetas Twitter no funciona con mi sitio! Documentación de las tarjetas de Twitter Tarjetas Twitter permiten que usted adjunte experiencias multimedia a los tweets que enlace a su contenido. Basta con añadir unas pocas líneas de HTML a sus páginas web, y los usuarios que envían Tweets de enlaces a su contenido tendrán una "tarjeta" añadida al Tweet que es visible para todos sus seguidores. Twitter no va a crear una tarjeta de foto a menos que la imagen twitter sea de un tamaño mínimo de 280px de ancho por 150px de alto. Las imágenes no se pueden recortar a menos que tengan una relación de aspecto excepcional Los bots de Twitter tienen que tener acceso a su sitio web en busca de su contenido, por lo que basta con insertar esto en el archivo :: Actualizado Uso de HTTPS para el iframe, stream, y todos los activos dentro de su Tarjeta. Utilice el menú desplegable para elegir qué tamaño usted quiere poner por defecto (puede reemplazar este con los campos METABOX). Ahora puede elegir (3.3.0) para forzar el recorte o no. No se olvide de ingresar en una imagen de reserva en caso de que ninguna opción esté establecida. También puede establecer el ancho y la altura de la imagen twitter para obtener un mejor control de la visualización de las tarjetas (sólo para fotos y tarjetas de procductos). Utilice wmode = opaco si utiliza Flash para la experiencia twitter.com, para que el reproductor opere en el índice-z correcto. Formularios de Validación ¿Qué son Twitter Cards? Con la versión 3.3.1 el plugin le permite desechar la METABOX si usted no quiere o necesita usarla. Esto introduce una mayor flexibilidad para los usuarios que no necesitan utilizar METABOX en cada publicación. Si la opción se establece en "Sí, por favor desactivarlo", los datos serán fijados por las opciones generales. WordPress es genial, pero a menudo tenemos que añadir algunos plugins SEO como <a href= "http://yoast.com/wordpress/seo/">WP SEO por Yoast </a> o <a href= "http://wordpress.org/plugins/all-in-one-seo-pack/">All In One SEO</a>.Estos plugins son muy muy populares y se pueden encontrar en una gran cantidad de instalaciones de WP. Tarjetas JM Twitter comprueba si se activa uno de los dos plugins y agarra el título del meta y la descripción que ha establecido. Esto permite que usted no pierda su tiempo escribiendo cosas dos veces para cada publicación. Si se olvida de cumplir con los campos de SEO no se preocupe, hay repliegue (título de la entrada y las primeras palabras de su puesto como la descripción). No se olvide de elegir el número de palabras que el lector tiene que captar para meta descripción Twitter (máximo 200). Sí, ahora es posible con 3,9, sólo tiene que hacer su propia función y "gancho" en <code> jmtc_markup </code> También puede establecer la cantidad de palabras que el plugin tiene que captar para establecer una descripción por defecto. Esto permite evitar meta descripciónTwitter vacía que a menudo rompe tarjetas twitter. Usted puede utilizar el siguiente fragmento de código en su functions.php o en un plugin de funcionalidad. Por Para altura máxima de 375px, el ancho máximo de 435px 