use App\Models\Article;

public function run()
{
    Article::insert([
        [
            'title' => 'Belajar HTML & CSS Dasar',
            'description' => 'Pelajari dasar HTML dan CSS',
            'image' => null
        ],
        [
            'title' => 'Mengenal Laravel untuk Pemula',
            'description' => 'Panduan Laravel dasar',
            'image' => null
        ],
        [
            'title' => 'Tips Membuat Website Responsif',
            'description' => 'Website semua device',
            'image' => null
        ],
        [
            'title' => 'Panduan Bootstrap Modern',
            'description' => 'UI cepat dan responsif',
            'image' => null
        ],
        [
            'title' => 'Trend Teknologi Web 2026',
            'description' => 'Update teknologi terbaru',
            'image' => null
        ],
        [
            'title' => 'Cara Membuat Blog Sederhana',
            'description' => 'Membuat blog dari nol',
            'image' => null
        ],
    ]);
}