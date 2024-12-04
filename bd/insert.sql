-- Insertar géneros
INSERT INTO `generos` (`estatus_genero`, `id_genero`, `nombre_genero`)
VALUES (1, NULL, 'Pop'),
    (1, NULL, 'Rock'),
    (1, NULL, 'Hip-Hop');
-- Insertar artistas
INSERT INTO `artistas` (
        `estatus_artista`,
        `id_artista`,
        `pseudonimo_artista`,
        `nacionalidad_artista`,
        `biografia_artista`,
        `id_usuario`,
        `id_genero`
    )
VALUES (
        1,
        NULL,
        'Artista1',
        'Estados Unidos',
        'Artista destacado en el género Pop.',
        2,
        1
    ),
    (
        1,
        NULL,
        'Artista2',
        'Reino Unido',
        'Artista famoso por su estilo único de Rock.',
        2,
        2
    ),
    (
        1,
        NULL,
        'Artista3',
        'Canadá',
        'Reconocido por su impacto en el Hip-Hop.',
        2,
        3
    );
-- Insertar álbumes
INSERT INTO `albumes` (
        `estatus_album`,
        `fecha_lanzamiento_album`,
        `id_album`,
        `titulo_album`,
        `descripcion_album`,
        `imagen_album`,
        `id_artista`,
        `id_genero`
    )
VALUES (
        1,
        '2023-05-01',
        NULL,
        'Álbum Pop Hits',
        'Una colección de los mejores éxitos del Pop.',
        NULL,
        1,
        1
    ),
    (
        1,
        '2022-11-15',
        NULL,
        'Rock Legends',
        'Un tributo a los mejores clásicos del Rock.',
        NULL,
        2,
        2
    ),
    (
        1,
        '2024-01-10',
        NULL,
        'Hip-Hop Beats',
        'Innovadores ritmos del Hip-Hop actual.',
        NULL,
        3,
        3
    );
-- Insertar canciones
INSERT INTO `canciones` (
        `estatus_cancion`,
        `id_acancion`,
        `nombre_cancion`,
        `fecha_lanzamiento_cancion`,
        `duracion_cancion`,
        `mp3_cancion`,
        `url_cancion`,
        `url_video_cancion`,
        `id_artista`,
        `id_genero`
    )
VALUES (
        1,
        NULL,
        'Canción Pop 1',
        '2023-06-01',
        '00:03:45',
        'pop1.mp3',
        'http://example.com/pop1',
        'http://youtube.com/pop1',
        1,
        1
    ),
    (
        1,
        NULL,
        'Canción Rock 1',
        '2022-12-01',
        '00:04:20',
        'rock1.mp3',
        'http://example.com/rock1',
        'http://youtube.com/rock1',
        2,
        2
    ),
    (
        1,
        NULL,
        'Canción Hip-Hop 1',
        '2024-02-01',
        '00:03:50',
        'hiphop1.mp3',
        'http://example.com/hiphop1',
        'http://youtube.com/hiphop1',
        3,
        3
    );
-- Insertar votaciones
INSERT INTO `votaciones` (
        `fecha_creacion_votacion`,
        `id_votacion`,
        `id_artista`,
        `id_album`,
        `id_usuario`
    )
VALUES (NOW(), NULL, 1, 1, 1),
    (NOW(), NULL, 2, 2, 1),
    (NOW(), NULL, 3, 3, 1);