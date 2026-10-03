<?php

namespace Database\Seeders;

use App\Enums\ArticleStatus;
use App\Models\Article;
use App\Models\Author;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SampleContentSeeder extends Seeder
{
    public function run(): void
    {
        // --- Categories (doc 02 §5) ---
        $categories = collect([
            ['name' => 'Dialogue with Wisdom', 'slug' => 'dialogue-with-wisdom', 'description' => 'Reflective conversations on statecraft, character and society.'],
            ['name' => 'Inspirational', 'slug' => 'inspirational', 'description' => 'Essays on leadership, character and public life.'],
            ['name' => 'Renewed Hope Intelligentsia', 'slug' => 'renewed-hope-intelligentsia', 'description' => 'Policy-focused commentary and analysis from the RHI desk.'],
            ['name' => 'Agribusiness', 'slug' => 'agribusiness', 'description' => 'Food systems, value chains and rural prosperity.'],
        ])->mapWithKeys(function (array $data) {
            $category = Category::firstOrCreate(['slug' => $data['slug']], $data);

            return [$data['slug'] => $category];
        });

        // --- Authors ---
        $authors = collect([
            ['name' => 'Wisdom Ndukwe', 'slug' => 'wisdom-ndukwe', 'title' => 'Principal Author', 'bio' => 'Founder and principal voice of National Policy Dialogue.'],
            ['name' => 'Amara Okafor', 'slug' => 'amara-okafor', 'title' => 'Policy Analyst', 'bio' => 'Covers economic policy, trade and food systems.'],
            ['name' => 'Tunde Bakare', 'slug' => 'tunde-bakare', 'title' => 'Contributing Editor', 'bio' => 'Writes on governance, institutions and public administration.'],
        ])->mapWithKeys(function (array $data) {
            $author = Author::firstOrCreate(['slug' => $data['slug']], $data);

            return [$data['slug'] => $author];
        });

        // --- Tags ---
        $tagNames = ['Governance', 'Economy', 'Education', 'Agriculture', 'Youth', 'Security', 'Energy', 'Federalism'];
        $tags = collect($tagNames)->mapWithKeys(
            fn (string $name) => [$name => Tag::firstOrCreate(['slug' => Str::slug($name)], ['name' => $name])],
        );

        // --- Sample articles ---
        $articles = [
            [
                'author' => 'wisdom-ndukwe',
                'categories' => ['dialogue-with-wisdom'],
                'tags' => ['Governance', 'Federalism'],
                'featured' => true,
                'featured_weight' => 100,
                'title' => 'The Ghana-Must-Go Decade: What Nigeria\'s Boxes Say About Us',
                'subtitle' => 'On migration, dignity and the quiet economies that carry a nation.',
                'excerpt' => 'Every departure at our airports tells a policy story. The question is whether Nigeria is listening — or merely waving goodbye.',
                'body' => <<<'HTML'
<p>Stand long enough at any Nigerian departure terminal and you will notice the boxes first. Taped, strapped, bulging — the <em>Ghana-must-go</em> bags have outlived every decree that named them. They are carried now not to Ghana, but to London, Toronto, Dubai and Berlin.</p>
<p>Each box is a compressed economic argument: a curriculum vitae folded beside dried fish, a certificate travelling with spice, remittances of culture heading for diaspora attics. Policymakers debate brain drain in conference halls; the boxes debate it daily at the departure gate.</p>
<h2>The numbers beneath the tarmac</h2>
<p>In the last decade, more Nigerians have emigrated than in any comparable period since the civil war. The destination countries changed — from Ghana in 1983 to the Gulf and the West today — but the mechanism remains the same: people move when the gap between effort and reward widens beyond tolerance.</p>
<blockquote>A nation does not lose its citizens in a day. It loses them by instalments — one visa stamp, one resignation letter, one farewell party at a time.</blockquote>
<h2>What dignity has to do with it</h2>
<p>Migration is not a moral failure of those who leave. It is a rational response to incentive structures — the price of diesel against the price of a lecture, the yield of a hectare against the yield of a rumour. If we want the boxes to stay unpacked, we must make staying rational again.</p>
<h2>Three policy postures</h2>
<ul>
<li><strong>Make work worthwhile:</strong> productivity-first industrial policy beats emotive appeals to patriotism.</li>
<li><strong>Make institutions predictable:</strong> talent tolerates hardship; it does not tolerate arbitrariness.</li>
<li><strong>Make return attractive:</strong> diaspora bonds, dual-era research funding and frictionless re-entry beat guilt-tripping.</li>
</ul>
<p>The Ghana-must-go bag was born of an eviction. Let it not become the emblem of a generation\'s exit. The abode of wisdom is not built by those who left, nor by those who stayed — but by those who build reasons to remain.</p>
HTML,
                'published_at' => now()->subDays(2),
            ],
            [
                'author' => 'amara-okafor',
                'categories' => ['agribusiness'],
                'tags' => ['Agriculture', 'Economy'],
                'title' => 'After the Fertiliser Subsidy: Rethinking Nigeria\'s Soil Economics',
                'subtitle' => 'Smart subsidies, soil maps and the unfinished business of the Green Alternative.',
                'excerpt' => 'Subsidies that reach bags instead of acres are failing the smallholder. A soil-first policy would cost less and grow more.',
                'body' => <<<'HTML'
<p>Nigeria\'s fertiliser story is a familiar tragedy in three acts: the subsidy is announced, the bags disappear, and the harvest disappoints. Between announcement and harvest lies a policy design flaw we have refused to correct for four decades.</p>
<h2>We subsidise the bag, not the soil</h2>
<p>A fertiliser subsidy assumes the binding constraint is nutrients. Across the Middle Belt, the constraint is often <em>knowledge</em> — farmers applying urea to soils that need phosphorus, or liming fields that are already alkaline. Money spent on the wrong input is not a subsidy; it is a transfer to confusion.</p>
<blockquote>The most expensive input a farmer can buy is the wrong one.</blockquote>
<h2>What a soil-first policy looks like</h2>
<ol>
<li><strong>Soil mapping as public infrastructure.</strong> A national, digitised soil atlas — ward by ward — is cheaper than one year of blanket subsidy.</li>
<li><strong>Extension reborn.</strong> One trained extension agent per ward, equipped with digital soil cards, outperforms a convoy of palliative trucks.</li>
<li><strong>Smart, crop-anchored vouchers.</strong> Vouchers that follow agronomic recommendations rather than political arithmetic.</li>
</ol>
<p>The Green Alternative had the right instincts. What it lacked was a delivery engine immune to the politics of distribution. Soil economics is unglamorous — but nations that feed themselves first learn to count their acres before they count their bags.</p>
HTML,
                'published_at' => now()->subDays(4),
            ],
            [
                'author' => 'tunde-bakare',
                'categories' => ['renewed-hope-intelligentsia'],
                'tags' => ['Governance', 'Security'],
                'title' => 'Local Government Autonomy and the Anatomy of Empty Promises',
                'subtitle' => 'Why the third tier keeps waiting for its own money.',
                'excerpt' => 'Autonomy on paper, captivity in practice: the joint account is where Nigerian federalism goes to compromise.',
                'body' => <<<'HTML'
<p>Every few years, the nation rediscovers that its closest government is its weakest. Supreme Court judgments are pronounced, communiqués issued, and the third tier celebrates its independence — until the next joint account meeting.</p>
<h2>The captivity is structural</h2>
<p>State joint local government accounts did not merely encourage dependency; they designed it. A tier of government that collects nothing, budgets through intermediaries and answers to governors cannot be autonomous by declaration. Structure eats slogan every time.</p>
<blockquote>Autonomy without fiscal architecture is a compliment, not a reform.</blockquote>
<h2>What must accompany the judgment</h2>
<ul>
<li>Direct crediting of allocations, with forensic-grade transparency dashboards.</li>
<li>Capacity audits before capital releases — autonomy without capacity produces white elephants.</li>
<li>Citizen-facing performance contracts for council chairmen.</li>
</ul>
<p>If the third tier is to be the government closest to the people, it must first be a government — not an annex.</p>
HTML,
                'published_at' => now()->subDays(6),
            ],
            [
                'author' => 'wisdom-ndukwe',
                'categories' => ['inspirational'],
                'tags' => ['Youth', 'Education'],
                'title' => 'Letters to a Young Nigerian Who Wants to Stay',
                'subtitle' => 'A case for patient ambition in an impatient country.',
                'excerpt' => 'Leaving is not the only bold decision available to talent. Staying can be an act of strategy — if it is done with open eyes.',
                'body' => <<<'HTML'
<p>Dear young Nigerian, the world is cheering for your departure. British visas, Canadian winters, German blue cards — the exit doors have never been more politely held open. This letter is not an argument against going. It is an argument for <em>deciding</em> — rather than defaulting — into departure.</p>
<h2>The mathematics of patience</h2>
<p>Markets reward scarcity. In Lagos, Abuja, Port Harcourt and the smaller cities between them, scarcity of disciplined, competent, patient builders remains extreme. The return on competence is asymmetric precisely because so many competent people have left.</p>
<blockquote>Nigeria does not need you to suffer. It needs you to stay long enough for your competence to compound.</blockquote>
<h2>Staying without sentiment</h2>
<ul>
<li>Pick a craft where the Nigerian problem <em>is</em> the market: energy, logistics, food processing, health financing.</li>
<li>Build portable proof — the same rigour that would make you employable abroad makes you formidable at home.</li>
<li>Keep your documents current. Strategic staying is not captivity; one can remain by choice and still hold a passport full of options.</li>
</ul>
<p>The abode of wisdom will not be built by those who merely discussed it. Someone must lay the bricks. Let it be those who stayed with their eyes open.</p>
HTML,
                'published_at' => now()->subDays(8),
            ],
            [
                'author' => 'amara-okafor',
                'categories' => ['dialogue-with-wisdom', 'agribusiness'],
                'tags' => ['Economy', 'Energy'],
                'title' => 'Cassava, Chips and the Curious Case of Nigeria\'s Missing Value Chains',
                'subtitle' => 'We export what grows and import what pays. The arithmetic never favours us.',
                'excerpt' => 'From garri to glucose syrup: the journey our crops take abroad and return as finished goods at triple the price.',
                'body' => <<<'HTML'
<p>Nigeria is the world\'s largest producer of cassava and, by some measures, among the largest importers of the starch derivatives made from it. We grow the tuber; others grow the margin. This is not an agricultural problem. It is an industrial policy problem wearing an apron.</p>
<h2>The journey of a tuber</h2>
<p>Follow a cassava root from a farm in Benue: it is peeled, grated, pressed and garri-ised — value captured at village scale. Meanwhile, the same crop, converted to syrup or ethanol in Thailand or Brazil, returns to Nigerian shelves as an input in our bread, our soft drinks, our pharmaceuticals.</p>
<blockquote>We do not need to invent new crops. We need to invent the courage to process the ones we already grow.</blockquote>
<h2>Why the mills moved</h2>
<p>Processors follow predictability: power that does not flicker, logistics that do not double in price mid-season, and fiscal policy that survives a budget cycle. Where predictability is absent, processing migrates — and takes the jobs with it.</p>
<ul>
<li>Anchor industrial power schemes around agro-clusters, not just industrial parks.</li>
<li>Commission out-grower schemes with enforceable off-take, not ceremonial ground-breaking.</li>
<li>Treat starch, sorghum and sugar value chains as national security adjacents — because they are.</li>
</ul>
<p>The cassava will keep growing whether we plan or not. The margin, however, only stays where it is built.</p>
HTML,
                'published_at' => now()->subDays(11),
            ],
            [
                'author' => 'tunde-bakare',
                'categories' => ['renewed-hope-intelligentsia'],
                'tags' => ['Education', 'Governance'],
                'title' => 'The University as a Policy Instrument, Not a Ceremonial Ground',
                'subtitle' => 'What Nigerian campuses would publish if they were asked to serve the state.',
                'excerpt' => 'Our universities hold the research capacity the civil service lacks. The bridge between them has never been built.',
                'body' => <<<'HTML'
<p>Ministries commission foreign consultancies for studies our own faculties could produce at a fraction of the cost. Meanwhile, academics chase promotion by publishing in journals no policymaker will ever read. Two worlds, both diligent, neither connected.</p>
<h2>The missing bridge</h2>
<p>Policy-relevant research does not fail for want of talent; it fails for want of translation. A professor of agricultural economics and a commissioner of agriculture rarely share a room, a deadline, or a vocabulary.</p>
<blockquote>A university that never advises the state is a guesthouse for ideas; the state that never asks is a stranger to its own intelligence.</blockquote>
<ul>
<li>Embed faculty fellows in ministries for one-year, problem-defined rotations.</li>
<li>Fund policy labs with briefs written by civil servants, not citation indexes.</li>
<li>Count influence in departments, not only in journals.</li>
</ul>
<p>The intelligentsia the nation awaits is already employed. It is waiting to be asked.</p>
HTML,
                'published_at' => now()->subDays(14),
            ],
        ];

        foreach ($articles as $entry) {
            $slug = Str::slug($entry['title']);

            $article = Article::updateOrCreate(
                ['slug' => $slug],
                [
                    'author_id' => $authors[$entry['author']]->id,
                    'title' => $entry['title'],
                    'subtitle' => $entry['subtitle'] ?? null,
                    'excerpt' => $entry['excerpt'],
                    'body' => $entry['body'],
                    'status' => ArticleStatus::Published,
                    'featured' => $entry['featured'] ?? false,
                    'featured_weight' => $entry['featured_weight'] ?? 0,
                    'published_at' => $entry['published_at'],
                ],
            );

            $article->categories()->sync(collect($entry['categories'])->map(fn ($slugKey) => $categories[$slugKey]->id)->all());
            $article->tags()->sync(collect($entry['tags'])->map(fn ($name) => $tags[$name]->id)->all());
        }
    }
}
