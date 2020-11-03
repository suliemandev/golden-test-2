@extends('website.layout')

@section('content')
	<particle 
        class="bg-gradient-dark flex flex-col h-full items-center justify-between relative w-screen">
        @include('website.partials.navigation')

        <div class="p-4 h-full items-center justify-center flex flex-col">
            <h2 class="text-3xl sm:text-4xl lg:text-6xl text-black text-center z-10">
                {{ __('Discover Your') }} <span class="font-bold">{{ __('Future') }} </span>
            </h2>
            <h4 class="text-md sm:text-lg lg:text-xl text-center mt-4 text-black opacity-75 z-10">
                {{ __('Intro description') }}
            </h4>

            <div class="flex items-center justify-center mb-16 mt-7 lg:mt-10">
                <button @click.prevent="slideToVideo" class="cursor-pointer bg-black border-2 border-black flex flex-shrink-0 h-16 items-center justify-center me-5 sm:me-6 relative rounded-full w-16 z-10 text-yellow-500 hover:text-white focus:outline-none">
                    <svg class="relative z-10 w-6 h-6" fill="currentColor" viewBox="0 0 256 256"><rect width="256" height="256" fill="none"></rect><path d="M232.3125,114.34375,88.34375,26.35937A15.99781,15.99781,0,0,0,64,40.00781V215.99219a16.00521,16.00521,0,0,0,24.34375,13.64843L232.3125,141.65625a16.00727,16.00727,0,0,0,0-27.3125Z"></path></svg>
                    <span class="animate-ping absolute inline-flex h-12 w-12 rounded-full bg-black opacity-50"></span>
                </a>

                <button @click.prevent="scrollTo('#quiz')" class="border-2 border-black flex-shrink-0 focus:outline-none hover:bg-black hover:text-white font-semibold px-7 sm:px-10 py-3 rounded-full text-black text-lg z-10">
                    {{ __('Start') }}
                </button>
            </div>
        </div>

        <div></div>
    </particle>
            
    <section>
        <div class="max-w-3xl mx-auto mb-10">
            <div class="bg-white rounded-xl shadow-xl w-full">
                <quiz></quiz>
            </div>
        </div>
    </section>

    <section>
        <div class="max-w-3xl mx-auto py-10 px-4 sm:px-0">
            <h2 class="text-xl text-black font-bold">ما هو الاختبار الذهبي؟</h2>
            <p class="mt-3 text-gray-800">
                يُعتبر قرار التعليم العالي من أهم القرارات التي يتخذها الانسان في حياته! لهذا قمنا في الاتحاد الاكاديمي على مدار أكثر عشر سنوات بتطوير مشروع التوجيه الدراسي والاكاديمي ليشمل محاضرات وورشات توعوية بالإضافة الى موقع خاص، خط استشارة مهني ومجلة سنوية لمساعدة الطلاب في اتخاذ القرار المناسب لهم. بعد عمل سنوات طويلة، يشرفنا ان نقدّم لكم الاختبار الذهبي كأداة إضافية لمساعدتكم بمعرفة ميولكم الاكاديمية والتعليمية.
            </p>
            <p class="mt-2 text-gray-800">الاختبار الذهبي هو برنامج محوسب لفحص الميول التعليمية من انتاج الاتحاد الأكاديمي، يهدف هذا الاختبار لمساعدتكم في اتخاذ قرار التعليم العالي من خلال أسئلة سريعة لتحليل الشخصية.</p>
            <p class="mt-2 text-gray-800">الزمن المقدّر لحل الاختبار الذهبي هو 20-15 دقيقة، ولكن لا حاجة للعجلة، يمكنكم أخذ الوقت الكافي لكي يتم الإجابة بدقة وتركيز.</p>
            <p class="mt-2 text-gray-800">في نهاية الاختبار سيتم عرض النتائج على شاشة الموبايل او الحاسوب. ستحصلون على النتائج الكاملة والتي تشمل قائمة بمجالات التعليم ومجموع النقاط لكل مجال. ستحصلون ايضاً على تقرير ملخّص يشمل المجالات الثلاث الأكثر ملائمة لشخصيتكم!! يمكنكم تصوير الشاشة لحفظ النتائج!!</p>
            <p class="mt-2 text-gray-800">ملاحظة هامة: نتائج الاختبار هي نصيحة وأداة مساعدة لمعرفة الاتجاه الأكاديمي ولا تبدّل وسائل أخرى مثل استشارة مهنية وشخصية، زيارة مؤسسات للتعليم، قراءة وبحث مجالات التعليم!!</p>
            <p class="mt-2 text-gray-800">الاختبار مجاني بتمويل من شركائنا الداعمين للتعليم العالي!</p>
            <p class="mt-2 text-gray-800">نتمنى لكم الاستفادة من هذا الاختبار!</p>
        </div>
    </section>

    <section>
        <div class="max-w-3xl mx-auto py-10 px-4 sm:px-0">
            <sponsors :sponsors="['/sponsors/1.png', '/sponsors/2.png', '/sponsors/3.png']"></sponsors>
        </div>
    </section>

	@include('website.partials.footer')

	{{-- @include('website.partials.banner')

	@include('website.partials.slides')

	@include('website.partials.categories')

	@include('website.partials.brands')

	@include('website.partials.tabs')

	@include('website.partials.about')

	@include('website.partials.requirments')

	@include('website.partials.footer') --}}
@endsection