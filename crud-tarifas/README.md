# CRUD WordPress Sample

Simple example of Create, Read, Update and Delete functionality for a custom table in WordPress

## Usage

- Copy all files in a _crud_ folder in your child-theme
- In the _crud-main.php_ file change SLUG_PAGE
- Create this custom table:

````php
  -- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sg_listaservcios`
--

CREATE TABLE `sg_listaservcios` (
  `codServicio` bigint(20) UNSIGNED NOT NULL,
  `descricioServicio` varchar(100) DEFAULT NULL,
  `tipoServicio` varchar(60) DEFAULT NULL,
  `condicionSevicio` varchar(11) DEFAULT NULL,
  `vigenciaSrart` date DEFAULT NULL,
  `vigenciaEnd` date DEFAULT NULL,
  `montoPagar` float DEFAULT NULL,
  `titulo` varchar(60) DEFAULT NULL,
  `Comentario` varchar(160) DEFAULT NULL,
    PRIMARY KEY (`codServicio`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;;


ALTER TABLE `sg_listaservcios`
  ADD UNIQUE KEY `codServicio` (`codServicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sg_listaservcios`
--
ALTER TABLE `sg_listaservcios`
  MODIFY `codServicio` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

- In your *functions.php* add:
```php
include_once( get_stylesheet_directory() . '/crud/crud-main.php' );
````

- Optional CSS in _style.css_

```css
.frm-detail-fruits label {
  width: 200px;
  display: inline-block;
}
.frm-detail-fruits > div {
  margin-bottom: 20px;
}
.message {
  border: 1px solid grey;
  padding: 10px 20px;
  margin: 20px auto 30px;
}
```

## License

[MIT](https://choosealicense.com/licenses/mit/)
