<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Category;
use App\Models\Region;
use App\Models\User;

class StoreSeeder extends Seeder
{
    public function run(): void
    {
        $mockBusinesses = [
            [
                'name' => 'مطعم الأصالة',
                'category' => 'مطعم',
                'type' => 'مطبخ شرقي',
                'description' => 'مطعم متخصص في الأكلات الشرقية التقليدية مع لمسة عصرية. نقدم أشهى المأكولات الشامية والسعودية.',
                'location' => 'الرياض - حي الملقا',
                'lat' => 24.774265, // Example lat/lng for Riyadh
                'lng' => 46.738586,
                'rating' => 4.8,
                'image' => 'https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg?auto=compress&cs=tinysrgb&w=800',
                'isNew' => true,
                'hasOffers' => true,
                'offer' => 'خصم 30% على الوجبات العائلية لأول 100 عميل',
                'phone' => '0501234567',
                'instagram' => '@alasala_restaurant',
                'openingDate' => '2024-01-15',
                'is_published' => true,
            ],
            [
                'name' => 'كافيه الحرمين',
                'category' => 'مقهى',
                'type' => 'مقهى وحلويات',
                'description' => 'مقهى عصري يقدم أفضل أنواع القهوة والحلويات الشرقية والغربية في أجواء مريحة.',
                'location' => 'جدة - الصحافة',
                'lat' => 21.543333, // Example lat/lng for Jeddah
                'lng' => 39.172778,
                'rating' => 4.6,
                'image' => 'https://images.pexels.com/photos/1126728/pexels-photo-1126728.jpeg?auto=compress&cs=tinysrgb&w=800',
                'isNew' => false,
                'hasOffers' => true,
                'offer' => 'اطلب مشروبين واحصل على الثالث مجاناً',
                'phone' => '0507654321',
                'instagram' => '@haramain_cafe',
                'openingDate' => '2023-12-01',
                'is_published' => true,
            ],
            [
                'name' => 'صالون الجمال الملكي',
                'category' => 'صالون',
                'type' => 'خدمات تجميل',
                'description' => 'صالون نسائي متخصص في خدمات التجميل والعناية بالشعر والبشرة مع أحدث التقنيات.',
                'location' => 'الرياض - النرجس',
                'lat' => 24.774265,
                'lng' => 46.738586,
                'rating' => 4.9,
                'image' => 'https://images.pexels.com/photos/3993449/pexels-photo-3993449.jpeg?auto=compress&cs=tinysrgb&w=800',
                'isNew' => true,
                'hasOffers' => true,
                'offer' => 'خصم 50% على جلسات العناية بالبشرة للعضوات الجدد',
                'phone' => '0509876543',
                'instagram' => '@royal_beauty_salon',
                'openingDate' => '2024-01-20',
                'is_published' => true,
            ],
            [
                'name' => 'متجر الإلكترونيات الذكية',
                'category' => 'متجر',
                'type' => 'إلكترونيات',
                'description' => 'متجر متخصص في أحدث الأجهزة الإلكترونية والذكية مع ضمان شامل وخدمة ما بعد البيع.',
                'location' => 'الدمام - الشاطئ',
                'lat' => 26.4207,
                'lng' => 50.0888,
                'rating' => 4.4,
                'image' => 'https://images.pexels.com/photos/356056/pexels-photo-356056.jpeg?auto=compress&cs=tinysrgb&w=800',
                'isNew' => false,
                'hasOffers' => true,
                'offer' => 'خصم 25% على جميع الهواتف الذكية',
                'phone' => '0502468135',
                'instagram' => '@smart_electronics_sa',
                'openingDate' => '2023-11-15',
                'is_published' => true,
            ],
            [
                'name' => 'مركز اللياقة البدنية',
                'category' => 'نادي رياضي',
                'type' => 'لياقة بدنية',
                'description' => 'مركز رياضي حديث مجهز بأحدث الأجهزة الرياضية مع مدربين محترفين وبرامج متنوعة.',
                'location' => 'جدة - الروضة',
                'lat' => 21.543333,
                'lng' => 39.172778,
                'rating' => 4.7,
                'image' => 'https://images.pexels.com/photos/1552252/pexels-photo-1552252.jpeg?auto=compress&cs=tinysrgb&w=800',
                'isNew' => true,
                'hasOffers' => true,
                'offer' => 'اشتراك 3 أشهر بسعر شهرين للأعضاء الجدد',
                'phone' => '0508024681',
                'instagram' => '@fitness_center_jeddah',
                'openingDate' => '2024-01-12',
                'is_published' => true,
            ],
            [
                'name' => 'مكتبة المعرفة',
                'category' => 'مكتبة',
                'type' => 'كتب وقرطاسية',
                'description' => 'مكتبة شاملة تضم أحدث الكتب والمراجع العلمية والأدبية مع قسم خاص للقرطاسية المدرسية.',
                'location' => 'الرياض - الملز',
                'lat' => 24.774265,
                'lng' => 46.738586,
                'rating' => 4.5,
                'image' => 'https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=800',
                'isNew' => false,
                'hasOffers' => true,
                'offer' => 'خصم 20% على جميع الكتب الأكاديمية',
                'phone' => '0505555555',
                'instagram' => '@knowledge_bookstore',
                'openingDate' => '2023-10-20',
                'is_published' => true,
            ],
            [
                'name' => 'عيادة الأسنان المتقدمة',
                'category' => 'عيادة',
                'type' => 'طب أسنان',
                'description' => 'عيادة أسنان متخصصة مجهزة بأحدث التقنيات في علاج وتجميل الأسنان مع فريق طبي متميز.',
                'location' => 'الرياض - العليا',
                'lat' => 24.774265,
                'lng' => 46.738586,
                'rating' => 4.8,
                'image' => 'https://images.pexels.com/photos/6812418/pexels-photo-6812418.jpeg?auto=compress&cs=tinysrgb&w=800',
                'isNew' => true,
                'hasOffers' => true,
                'offer' => 'فحص مجاني + خصم 30% على التنظيف للزيارة الأولى',
                'phone' => '0501112233',
                'instagram' => '@advanced_dental_clinic',
                'openingDate' => '2024-01-25',
                'is_published' => true,
            ],
            [
                'name' => 'ورشة السيارات الحديثة',
                'category' => 'ورشة',
                'type' => 'صيانة سيارات',
                'description' => 'ورشة متخصصة في صيانة وإصلاح جميع أنواع السيارات مع ضمان على الخدمة وقطع الغيار الأصلية.',
                'location' => 'الدمام - الفيصلية',
                'lat' => 26.4207,
                'lng' => 50.0888,
                'rating' => 4.6,
                'image' => 'https://images.pexels.com/photos/3806288/pexels-photo-3806288.jpeg?auto=compress&cs=tinysrgb&w=800',
                'isNew' => false,
                'hasOffers' => true,
                'offer' => 'خدمة تغيير الزيت مجاناً مع أي خدمة صيانة',
                'phone' => '0507778899',
                'instagram' => '@modern_car_workshop',
                'openingDate' => '2023-12-10',
                'is_published' => true,
            ],
        ];

        // Ensure required foreign keys exist
        $user = User::first() ?? User::factory()->create();
        $region = Region::first() ?? Region::factory()->create(['name' => 'الرياض']);
        foreach ($mockBusinesses as $biz) {
            $category = Category::where('name', $biz['category'])->first();
            if (!$category) {
                $category = Category::create([
                    'name' => $biz['category'],
                    'icon' => 'default',
                ]);
            }
            $store = Store::create([
                'user_id' => $user->id,
                'region_id' => $region->id,
                'category_id' => $category->id,
                'name' => $biz['name'],
                'description' => $biz['description'],
                'address' => $biz['location'],
                'lat' => $biz['lat'],
                'lng' => $biz['lng'],
                'is_published' => $biz['is_published'],
                'open_date' => $biz['openingDate'],
            ]);

            // أضف صورة للمتجر في جدول store_images
            \App\Models\StoreImage::create([
                'store_id' => $store->id,
                'image_url' => $biz['image'],
            ]);
        }
    }
}
