<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    |
    | Set some default values. It is possible to add all defines that can be set
    | in dompdf_config.inc.php. You can also override the entire config file.
    |
    */
    'show_warnings' => false,   // Throw an Exception on warnings from DomPDF
    'orientation' => 'portrait',

    // Tambahkan konfigurasi 'isRemoteEnabled'
    'isRemoteEnabled' => true, // Mengizinkan penggunaan file/gambar remote dalam PDF

    'defines' => [
        /**
         * The location of the DOMPDF font directory
         *
         * The location of the DOMPDF font directory. This directory is
         * completely controlled by dompdf and must be writable by the webserver
         * process. The location of this directory can be changed by the user
         * before rendering a PDF.
         *
         * Note: This directory must exist and be writable by the webserver
         * process. Dompdf will not create it automatically.
         *
         * @var string
         */
        "DOMPDF_FONT_DIR" => storage_path('fonts/'), // advised by dompdf (https://github.com/dompdf/dompdf/pull/782)

        /**
         * The location of the DOMPDF font cache directory
         *
         * This directory contains the cached font metrics for the fonts used
         * by dompdf. This directory can be the same as DOMPDF_FONT_DIR
         *
         * Note: This directory must exist and be writable by the webserver
         * process. Dompdf will not create it automatically.
         *
         * @var string
         */
        "DOMPDF_FONT_CACHE" => storage_path('fonts/'),

        /**
         * The location of a temporary directory.
         *
         * The directory specified must be writeable by the webserver process.
         * The temporary directory is required to download remote images and
         * when using the PFDLib back end.
         *
         * @var string
         */
        "DOMPDF_TEMP_DIR" => storage_path('temp/'),

        /**
         * Whether to use Unicode fonts or not.
         *
         * When set to true the PDF backend must be set to "CPDF" and fonts must
         * be loaded through load_font.php.
         *
         * @var bool
         */
        "DOMPDF_UNICODE_ENABLED" => true,

        /**
         * Whether to enable font subsetting or not.
         *
         * When set to true subsets of fonts are embedded in the PDF, rather
         * than the whole font. This is useful for saving bandwidth and
         * improving performance.
         *
         * @var bool
         */
        "DOMPDF_ENABLE_FONT_SUBSETTING" => false,

        /**
         * The PDF rendering backend to use
         *
         * Valid settings are 'PDFLib', 'CPDF' (the default) and 'GD'.
         *
         * @var string
         */
        "DOMPDF_PDF_BACKEND" => "CPDF",

        /**
         * Whether to enable inline PHP
         *
         * If this setting is set to true then DOMPDF will automatically evaluate
         * inline PHP contained within <script type="text/php"> ... </script> tags.
         *
         * Enabling this for documents you do not trust (e.g. arbitrary remote html
         * pages) is a security risk. Set this option to false if you wish to process
         * untrusted documents.
         *
         * @var bool
         */
        "DOMPDF_ENABLE_PHP" => false,

        /**
         * Whether to enable remote file access
         *
         * If this setting is set to true, DOMPDF will access remote sites for
         * images and CSS files as required.
         * This is required for some configurations of media.php with DOMPDF.
         *
         * @var bool
         */
        "DOMPDF_ENABLE_REMOTE" => true,
    ],
];
