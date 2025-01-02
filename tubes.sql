-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2025 at 08:46 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `type` enum('video','article') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'article',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('published','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `published_at` timestamp NULL DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `type`, `url`, `category`, `status`, `published_at`, `author`, `thumbnail`, `created_at`, `updated_at`) VALUES
(2, 'Belajar Python [Dasar] - 01 - Apa Itu Python', 'Yuk Belajar Python dasar di seri Tutorial Python Bahasa Indonesia untuk pemula.\r\n\r\nAyo Belajar Python lewat seri Python dasar bahasa indonesia', 'video', 'https://youtu.be/iA8lLwmtKQM?si=ZHVUxWSqDEHFZczD', 'Membuat Situs Web', 'published', '2024-12-29 07:48:00', 'Kelas Terbuka', 'storage_articles/1735769063.png', '2024-12-29 00:48:56', '2025-01-01 15:04:23'),
(3, 'Belajar Digital Marketing dari 0 | Bukan Soal Jualan, tapi Mahamin Orang!', 'Pas denger kata marketing, apa yang ada di pikiran lu? Nyebarin brosur? Atau ngiklan lewat medsos? Yah… enggak sepenuhnya salah, sih.\r\n\r\nKalau lu jago masarin brand di internet, bakal banyak orang yang nyari skill lu. Soalnya, bisa bikin makin cuan. Keuntungannya gak main-main, pokoknya! Ah masa, sih sampe segitunya? Iya, soalnya bisa aja bisnis lu untung berkali-kali lipat karena nerapin digital marketing! Tapi… sebelum itu, ayo kenalan dulu sama dasar-dasarnya. Pastiin juga lu tonton sampai abis!~ Enjoy the video!\r\n\r\nTaman Edukasi adalah wadah di mana berbagai kreator terpilih memproduksi video pembelajaran berkualitas di bidang akademik dan vokasi. Program ini didukung/disponsori oleh YouTube Learning kolaborasi bersama Kok Bisa. YouTube Learning Fund memiliki misi untuk menyediakan video-video edukasi berkualitas untuk jutaan pelajar dan guru di seluruh Indonesia, secara gratis. Jadi tunggu apalagi? Ayo subscribe, let\'s watch the videos and go curiosity!\r\n#belajarjadiasik', 'video', 'https://youtu.be/aQbZdee5PXI?si=1DZQKVsj1ej7bSmr', 'Manajemen Media Sosial', 'published', '2024-12-29 08:17:00', 'Agusleo Halim', 'storage_articles/1735769044.png', '2024-12-29 01:18:37', '2025-01-01 15:04:04'),
(4, 'Belajar SEO untuk Pemula dengan 10 Langkah Ini', 'SEO merupakan faktor krusial dalam digital marketing yang kini semakin berkembang. Namun, untuk seorang pemula, belajar SEO dapat terasa menantang dan membingungkan.\r\n\r\nPadahal, SEO sangat mempengaruhi ranking website dalam hasil pencarian. Tanpa menerapkannya, website akan sulit muncul pada halaman awal mesin pencari, sehingga jarang pengguna internet yang mengunjungi.\r\n\r\nHal tersebut akan berdampak pada tingkat penjualan jasa atau layanan yang ditawarkan. Maka dari itu, perusahaan perlu staf yang paham mengenai SEO.\r\n\r\nCara Belajar SEO untuk Pemula dalam 10 Langkah\r\n\r\nBagi kamu yang ingin mengembangkan karir dalam dunia digital, baik sebagai SEO specialist maupun pengelola web, kemampuan SEO merupakan hal yang sangat penting.\r\n\r\nPasalnya, SEO menjadi penentu utama dalam persaingan digital marketing. Lantas, bagaimana cara belajar SEO? Apakah harus menempuh pendidikan khusus?\r\n\r\nNah, tenang saja, Sob. Ada langkah-langkah mudah untuk belajar SEO pemula. Mari simak bersama caranya di bawah ini:\r\n\r\n1. Mempelajari Fundamental SEO\r\n\r\nLangkah pertama dalam belajar SEO yaitu memahami konsep-konsep fundamental yang merupakan dasar dari SEO.\r\n\r\nSebelum mengulas lebih lanjut, ada baiknya untuk mengenal dulu pengertian dari SEO.\r\n\r\nSearch Engine Optimization atau SEO adalah proses mengoptimasi website dengan tujuan untuk meningkatkan ranking dalam hasil pencarian serta mendapatkan lebih banyak traffic organik.\r\n\r\nDengan kata lain, SEO merupakan cara yang bisa kamu lakukan agar Google menampilkan website milikmu.\r\n\r\nUntuk mempelajari SEO, maka kamu perlu memahami cara kerja mesin pencari dan empat komponen utama SEO.\r\n\r\na. Cara Kerja Mesin Pencari\r\n\r\nMesin pencari seperti Google bekerja dengan menemukan konten dan menyimpannya pada database besar yang disebut index. Jadi, saat kamu melakukan pencarian, Google akan menunjukkan hasil dengan mengambil data pada index.\r\n\r\nArtinya, jika website kamu tidak terdapat dalam index, maka tidak akan muncul dalam hasil pencarian. Sementara untuk ada dalam index ada dua cara, yaitu dengan submit sitemap ke Google atau menghubungkan link dari website yang sudah masuk index.\r\n\r\nb. Riset Keyword\r\nNah, setelah memahami tentang cara kerja mesin pencari, kamu dapat melanjutkan dengan mempelajari riset keyword.\r\n\r\nMelansir dari Ahrefs, riset keyword adalah proses untuk menemukan apa yang target customer kamu cari. Penggunaan keyword yang tepat sangat penting agar customer menemukan konten website milikmu.\r\n\r\nKamu bisa menemukan banyak kata kunci populer menggunakan tool riset keyword, seperti Ahrefs, Keywordtool.io, Google Keyword Planner, dan banyak lagi.\r\n\r\nSelain mencari keyword, kamu juga perlu mengerti cara memilih keyword yang tepat untuk meningkatkan traffic website.\r\n\r\nUntuk website yang terbilang baru dan memiliki traffic rendah, maka kamu bisa memilih keyword relevan dengan search volume yang besar.\r\n\r\nSementara untuk web dengan traffic yang cukup tinggi, kamu perlu mempertimbangkan metrik lain seperti keyword difficulty dan search intent.\r\n\r\nc. SEO On-Page\r\nSEO on page yaitu proses optimasi konten website supaya mendapatkan ranking lebih tinggi pada mesin pencari.\r\n\r\nDengan kata lain, SEO on page meliputi berbagai upaya yang bisa kamu lakukan pada website.\r\n\r\nSehingga untuk belajar SEO on page kamu perlu memahami cara melakukan optimasi website, seperti optimasi konten, optimasi tag judul, link internal, dan optimasi performa halaman.\r\n\r\nd. Link Building/Off Page\r\nMengutip dari Ahrefs, link building merupakan proses mendapatkan backlink dari website lain untuk menghubungkannya dengan website milikmu.\r\n\r\nBacklink termasuk dalam tiga faktor paling berpengaruh pada Google ranking, sehingga sangat penting untuk memilikinya.\r\n\r\nSedikit tips untuk membuat link yang efektif mendongkrak ranking web kamu, yaitu dengan menggunakan link dari website yang relevan dan berkualitas tinggi.\r\n\r\nDari sini kamu pasti paham mengenai perbedaan antara Sisi SEO On Page dan SEO Off Page, Lantas apa saja SEO OffPage itu?\r\n\r\n  1. link building\r\nLink building adalah Teknik SEO yang cukup populer, Teknik optimasi website dengan cara membuat link eksternal dari website lain menuju blog kamu. Link building juga biasa disebut dengan Backlink.\r\n\r\n  2. Sosial signal\r\nSocial signal atau social sharing adalah optimasi website dengan cara melakukan share pada sosial media untuk mendatangkan visitor. Cara ini mudah untuk diterapkan bagi kamu yang masih Belajar SEO untuk Pemula. Karena kamu tak perlu ribet untuk melakukan optimasi webste kamu secara luas.\r\n\r\n  3. Branding\r\nNah cara yang mudah untuk Belajar teknik SEO ini dengan bagaimana kamu bisa menciptakan Brand Awarenes pada layanan atau produk yang kamu sediakan. Dari situlah kamu mudah dalam meningkatkan branding website kamu.\r\n\r\ne. SEO Technical\r\nIstilah SEO teknis sering kali dianggap sama dengan SEO on page. Namun, SEO Technical merupakan optimasi yang bertujuan teknis. Hal ini sangat berbeda dari SEO on page yang lebih fokus pada konten.\r\n\r\nSEO teknis memastikan bahwa Google dapat menemukan, crawl, dan mengindex konten website milikmu. Proses crawl dan index dari Google hanya dapat berlangsung apabila telah mendapatkan izin.\r\n\r\nPenggunaan backlink dan memastikan telah submit sitemap dapat meningkatkan peluang web milikmu untuk ditemukan.\r\n\r\nF. Content Marketing\r\nContent marketing adalah usaha pemasaran yang bertujuan untuk memberikan manfaat pada user yang memiliki tujuan meningkatkan brand awarenes atau membuat user lebih mengenal bisnis kamu.\r\n\r\nContent marketing tidak jauh berbeda dengan SEO, Sehingga kamu bisa belajar Penerapan SEO dan Content Marketing.\r\n\r\nUntuk bisa menguasai Content Marketing kamu harus paham mengenai cara membuat konten yang berkualitas bagi para pengguna, Hal tersebut menjadi inti dari content marketing.\r\n\r\n2. Mempraktekkan Teori SEO\r\nSetelah memahami dasar SEO, maka kamu perlu mempraktekkannya sambil mempelajari proses penerapan SEO. Pasalnya, mempelajari SEO memang lebih efektif melalui praktek.\r\n\r\nJika kamu bekerja pada website yang sudah ada, maka hal pertama yang perlu kamu lakukan adalah SEO audit, yaitu mengevaluasi kinerja SEO yang sudah diterapkan.\r\n\r\nSetelah mengetahui kondisi website, maka kamu bisa mulai membuat strategi SEO.\r\n\r\nSelain mempelajari teori, kamu juga harus mempraktikkannya dengan membuat project sendiri. Nah, untuk membuat website kamu bisa mulai dengan membeli Domain Murah dan Hosting Termurah yang tersedia di Jagoan Hosting.\r\n\r\nDengan membuat web blog di Jagoan Hosting, kamu akan mendapatkan support plugin premium dan performa yang tinggi.\r\n\r\n3. Belajar SEO sesuai CMS\r\nCMS (Content Management System) adalah aplikasi software yang memungkinkan kamu untuk membangun dan mengelola website tanpa harus melakukan coding dari awal.\r\n\r\nCMS menjadi solusi yang banyak dipilih untuk membuat website dengan pengetahuan teknis dan sumber daya yang terbatas.\r\n\r\nMelansir dari Hubspot, lebih dari 68 juta website dibangun dengan CMS.\r\n\r\nAplikasi ini memungkikan kustomisasi dari konten, desan, dan fungsionalitas website dengan mudah. Beberapa CMS yang banyak digunakan yaitu WordPress, CMS Hub, Magento, Webflow, dan Joomla.\r\n\r\nUmumnya, platform CMS menawarkan fitur bawaan dan add on untuk membantu SEO website. Kamu bisa menggunakan fitur-fitur tersebut untuk meningkatkan ranking web.\r\n\r\nSebagai contoh, jika website kamu menggunakan WordPress, maka kamu perlu belajar SEO WordPress, termasuk cara kustomisasi judul dan meta deskripsi, memiliki struktur URL yang SEO friendly, dan banyak lagi.\r\n\r\n4. Memperdalam Pengetahuan SEO\r\nTidak seorang pun bisa mempelajari setiap detail dari SEO dalam sekali duduk. Oleh karena itu, kamu juga tidak perlu buru-buru dalam mempelajarinya, Sob.\r\n\r\nSetelah belajar SEO dasar dan menerapkan beberapa strategi SEO sesuai CMS, maka waktunya kamu mempelajari aspek lain dari SEO.\r\n\r\nDi antara berbagai aspek SEO, kamu bisa mendalami area yang lebih umum atau yang menurutmu perlu dikuasai. Beberapa contoh aspek SEO yaitu internal link, optimasi kecepatan web, optimasi gambar, analisis backlink dan banyak lagi.\r\n\r\nKamu juga bisa memilih untuk mendalami satu aspek SEO tertentu, namun tetap memahami mengenai aspek lainnya.\r\n\r\n5. Menerapkan Otomatisasi SEO\r\nBanyak tugas terkait SEO yang pengerjaannya butuh waktu lama dan harus kamu lakukan secara berkala. Untungnya, tugas-tugas tersebut dapat dapat diotomatisasi menggunakan tools tertentu.\r\n\r\nBanyak digital marketer yang menerapkan otomatisasi SEO supaya lebih efisien waktu. Berikut beberapa tugas SEO yang bisa kamu otomatisasi:\r\n\r\n  - Website crawls\r\n  - Menganalisa kualitas profil link\r\n  - Position tracking\r\n  - Memantau penyebutan brand dan link baru\r\n  - Analisis keyword intent\r\n  - Membuat meta description dalam skala besar\r\n \r\nMelansir dari Surfer SEO, berikut beberapa tool otomatisasi SEO terbaik yang bisa kamu gunakan:\r\n\r\n  - SEMrush Keyword Magic Tool\r\n  - Surfer\r\n  - Ahrefs Content Explorer\r\n  - SEO PowerSuite\r\n  - Little Warden\r\n\r\n6. Mempelajari SEO pada Berbagai Mesin Pencari\r\nUntuk semakin meningkatkan traffic website, ada baiknya bagi kamu untuk belajar SEO pada berbagai mesin pencari. Selain Google, terdapat beberapa mesin pencari yang sering digunakan oleh pengguna internet, seperti:\r\n\r\n  - Bing\r\n  - Baidu\r\n  - Yandex\r\n  - Amazon\r\n  - Naver\r\n  - YouTube\r\n\r\n7. Mengikuti Update SEO\r\nMeskipun dasar-dasar SEO tetap sama, ada banyak aspek SEO yang terus mengalami perubahan secara.\r\n\r\nTerlebih lagi Google melakukan beberapa kali update dalam setahun, sehingga berdampak pada berubahnya cara mesin pencari menangani aspek teknis SEO. Oleh karena itu, penting bagi kamu untuk selalu mengikuti kabar dan update SEO.\r\n\r\nBerikut beberapa tips untuk melakukannya:\r\n\r\n  - Mengikuti konferensi SEO\r\n  - Bergabung ke grup Facebook SEO\r\n  - Mendengarkan podcast SEO\r\n  - Bergabung ke komunitas SEO\r\n  - Mengikuti kabar dari sumber resmi, seperti Search Console Blog dari Google\r\n  - Membaca berita terkait SEO, seperti topik SEO di blog Jagoan Hosting.\r\n\r\n8. Menggunakan Tools SEO Gratis\r\nSetelah memahami cara kerja SEO dengan baik, kamu dapat memanfaatkan berbagai tools SEO yang menyediakan layanan gratis.\r\n\r\nAda berbagai tools gratis yang dapat membantu kamu melakukan tugas SEO, seperti:\r\n\r\n  - Tool riset keyword bisa menggunakan Google Keyword Planner\r\n  - Tool cek SEO on page bisa dengan menggunakan plugin SEO pada CMS WordPress seperti Rankmath dan Yoast\r\n  - Cek backlink gratis bisa memakai tool Ahrefs Backlink Generator\r\n  - Tool untuk memantau dan melacak ranking secara gratis bisa menggunakan Google Search Console\r\n  - Tool untuk mengecek jumlah kunjungan secara realtime bisa menggunakan Google Analytics\r\n  - Cek kecepatan website di PageSpeed Insights\r\n  - Mobile SEO tools bisa kamu cek langsung di Google Search Console\r\n  - Memanfaatkan ChatGPT untuk SEO\r\n\r\n9. Melengkapi SEO dengan Keterampilan Lain\r\nMeskipun sekarang tersedia banyak cara untuk belajar SEO gratis, terkadang terdapat aspek yang tidak bisa kita pelajari secara mandiri.\r\n\r\nNah, untuk menyempurnakannya kamu bisa mengikuti kursus atau webminar SEO. Melalui program tersebut kamu menyediakan kesempatan untuk belajar dari praktisi SEO yang sudah ahli.\r\n\r\nSelain itu, kamu juga bisa melengkapi SEO dengan keahlian lain, seperti pemahaman mengenai Google Analytics dan Javascript.\r\n\r\nKamu juga bisa mengasah berbagai soft skill yang menunjang SEO, seperti kemampuan analisis, penulisan konten, kemampuan dalam menggunakan tools SEO, web coding, dan banyak lagi.\r\n\r\n10. Terus Melatih Kemampuan\r\nKemampuan SEO idealnya terus berkembang mengikuti update dan berbagai perubahan yang terjadi.\r\n\r\nSeperti yang telah disampaikan sebelumnya, mesin pencari melakukan update algoritma secara berkala. Maka dari itu, praktisi SEO pun tidak boleh berhenti belajar dan melatih kemampuan.\r\n\r\nSelain itu, SEO website juga perlu pemantauan dan analisa secara berkala untuk memastikan tingkat efektivitas kinerjanya.\r\n\r\nAda kalanya juga muncul berbagai permasalahan terkait SEO yang perlu kamu atasi, misalnya situs tidak muncul dalam hasil pencarian Google.\r\n\r\nSalah satu cara untuk meningkatkan keahlian selain dengan memulai membuat website sendiri yaitu dengan mengikuti berbagai pelatihan SEO gratis. Kamu juga bisa mengikuti kursus berbayar jika ingin mendapatkan lebih banyak keuntungan.', 'article', 'https://www.jagoanhosting.com/blog/belajar-seo-pemula/', 'Optimasi SEO', 'published', '2024-12-29 08:54:00', 'Jagoan Hosting Tim', 'storage_articles/1735803880.png', '2024-12-29 01:55:25', '2025-01-02 00:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_services`
--

CREATE TABLE `customer_services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_services`
--

INSERT INTO `customer_services` (`id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Hawari', 'hawari@digi.com', '081234567891', 'Ini websitenya cukup keren dan sudah sangat membantu dalam menjalankan UMKM', '2025-01-02 01:24:52', '2025-01-02 01:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guideline`
--

CREATE TABLE `guideline` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guideline`
--

INSERT INTO `guideline` (`id`, `title`, `description`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Panduan Pembayaran Digital', 'Panduan ini dirancang untuk memberikan informasi lengkap mengenai prosedur dan ketentuan pembayaran digital yang aman, efisien, dan mudah digunakan. Sistem pembayaran digital mendukung transaksi secara real-time dan memastikan keamanan data pelanggan dengan enkripsi tingkat tinggi.\r\n\r\nPanduan Pembayaran Digital\r\n\r\n1. Metode Pembayaran yang Tersedia\r\nTransfer Bank: Mendukung berbagai bank lokal dan internasional.\r\nDompet Digital (E-Wallet): Termasuk OVO, GoPay, Dana, ShopeePay, dan lainnya.\r\nVirtual Account (VA): Kode khusus untuk pembayaran otomatis tanpa verifikasi manual.\r\nKartu Kredit/Debit: Visa, Mastercard, dan JCB.\r\nKode QRIS: Pembayaran cepat melalui pemindaian kode QR.\r\n\r\n2. Prosedur Pembayaran\r\nPilih Produk atau Layanan: Tambahkan produk/layanan ke keranjang.\r\nPilih Metode Pembayaran: Tentukan metode yang diinginkan sesuai kebutuhan.\r\nKonfirmasi Pembayaran: Ikuti instruksi pembayaran yang tersedia di layar.\r\nVerifikasi Pembayaran: Transaksi akan diverifikasi secara otomatis dalam beberapa detik hingga maksimal 24 jam.', 'Active', 'storage_guidelines/1735804272.jpeg', '2024-12-31 10:17:23', '2025-01-02 00:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2024_12_18_070703_create_training_programs_table', 1),
(5, '2024_12_18_073002_add_fields_to_training_programs_table', 2),
(6, '2024_12_18_082733_add_schedule_to_training_programs_table', 3),
(8, '0001_01_01_000000_create_users_table', 4),
(9, '0001_01_01_000001_create_cache_table', 4),
(10, '0001_01_01_000002_create_jobs_table', 4),
(11, '2024_12_23_142830_add_username_to_users_table', 4),
(12, '2024_12_28_072247_create_articles_table', 5),
(13, '2025_01_01_155532_create_guideline_table', 6),
(14, '2024_12_28_074840_create_customer_services_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('phf6bR0ZsgxUgQWr8BNltrrpCqVmcaZhLZo97DlJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTTdpc0FqM1Q1bVAwV3VweVc0RlRuNFI1Uk15Z1V2WWtoN3Nucm51ViI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1735481045);

-- --------------------------------------------------------

--
-- Table structure for table `training_programs`
--

CREATE TABLE `training_programs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'upcoming',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_programs`
--

INSERT INTO `training_programs` (`id`, `title`, `description`, `location`, `venue`, `time`, `status`, `created_at`, `updated_at`, `price`, `image`, `start_date`, `end_date`, `start_time`, `end_time`) VALUES
(2, 'Driving Impactful Innovation Through Human-Centric Organizational Transformation', 'Free Webinar', 'Online', NULL, NULL, 'upcoming', '2024-12-18 02:22:57', '2025-01-02 00:39:16', '0.00', 'program_images/1735803556.jpeg', '2025-01-30', '2025-01-30', '14:00:00', '17:00:00'),
(3, 'Certified International Professional Negotiator (CIPN)', 'Seminar Pengembangan Diri', 'Online', NULL, NULL, 'upcoming', '2024-12-23 21:44:16', '2025-01-02 00:39:23', '5000000.00', 'program_images/1735803563.jpeg', '2025-04-21', '2025-04-23', '08:30:00', '16:00:00'),
(4, 'LEADERSHIP FOR MANAGERS', 'seminar', 'Offline', 'Ibis Hotel, Jawa Barat', NULL, 'upcoming', '2024-12-24 02:41:00', '2025-01-02 00:38:46', '90000.00', 'program_images/1735803526.jpeg', '2024-12-25', '2024-12-25', '13:00:00', '19:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@digi.com', NULL, '$2y$12$TyFesE7DEiODTcU0dKJLFOD5XpL3xFbpS6X/ZmiZ9Lm3n488XqWhK', NULL, '2024-12-29 00:28:46', '2025-01-01 14:10:13'),
(2, 'shafwanhy', 'awan@awan.com', NULL, '$2y$12$YFBoK4hYMnRK4f.jf6T08OKzrjeKLOsgX8WLuj0paJcDeYHQ1LHbG', NULL, '2024-12-29 04:41:14', '2024-12-29 07:15:38'),
(3, 'hawari', 'hawari@digi.com', NULL, '$2y$12$TObWZWFNzRcENcK4OjeCZetogry5dg.jMcgVNz7eu2QiwXKd7vNki', NULL, '2024-12-29 05:02:44', '2024-12-29 05:02:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customer_services`
--
ALTER TABLE `customer_services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_services_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guideline`
--
ALTER TABLE `guideline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `training_programs`
--
ALTER TABLE `training_programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_services`
--
ALTER TABLE `customer_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guideline`
--
ALTER TABLE `guideline`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `training_programs`
--
ALTER TABLE `training_programs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
