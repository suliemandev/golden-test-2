<section class="md:container mx-auto mb-10 mt-12">
	<brands :brands="{{ collect($brands)->toJson() }}" locale="{{ $locale }}"></brands>
</section>