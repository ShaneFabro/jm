<?php

use Illuminate\Database\Seeder;
use App\RubricCategory;

class RubricCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\RubricCategory::create([
            'name' => 'Includes name, email and phone number. May include address.',
            'title_id' => '1',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Name stands out on the resume',
            'title_id' => '1',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Email listed is professional',
            'title_id' => '1',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'May include: LinkedIn URL. If so, URL provided is customized',
            'title_id' => '1',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Missing 1 of the following: name, email, or phone number',
            'title_id' => '1',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Name does not stand out on resume',
            'title_id' => '1',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Email listed is too casual',
            'title_id' => '1',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'May include: LinkedIn URL. If so, URL provided is not customized',
            'title_id' => '1',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Missing 2 or more of the following: name, email, or phone number',
            'title_id' => '1',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Contains unnecessary personal information (e.g. birthday, age, height, gender, nationality, etc.)',
            'title_id' => '1',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Email is unprofessional or inappropriate for the workplace',
            'title_id' => '1',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Includes the word “Resume',
            'title_id' => '1',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Includes full name of University',
            'title_id' => '2',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Location (city)',
            'title_id' => '2',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Official name of degree (i.e. Bachelor of Science) listed',
            'title_id' => '2',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Expected Graduation date (month/year) included',
            'title_id' => '2',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Correct major listed',
            'title_id' => '2',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'May include: honors, scholarships, GWA',
            'title_id' => '2',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Includes tertiary and secondary education',
            'title_id' => '2',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Name of University not spelled out (i.e. UST)',
            'title_id' => '2',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Degree is abbreviated (i.e. BS or BS)',
            'title_id' => '2',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => '1 of the following is not accurate: name of degree, institution, location or date',
            'title_id' => '2',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Missing name of University',
            'title_id' => '2',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'No city listed',
            'title_id' => '2',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Incorrect title of degree',
            'title_id' => '2',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => '2 or more of the following are not accurate: name of degree, institution, location or date',
            'title_id' => '2',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Listing multiple colleges attended (where no degree was earned)',
            'title_id' => '2',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Presents relevant experiences first, including related employment, internships in field, student teaching, shadowing and/or service learning',
            'title_id' => '3',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Quantify and qualify your accomplishments- includes the action, task and result',
            'title_id' => '3',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Highlight transferable skills from other work experiences',
            'title_id' => '3',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Content listed in reverse chronological order',
            'title_id' => '3',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Includes the name and location of the employer/ organization',
            'title_id' => '3',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Lists job title and starting/ending dates for each assignment',
            'title_id' => '3',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Use action verbs and specific examples to describe key accomplishments and contributions',
            'title_id' => '3',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Relevant experience listed but not ordered first on the resume',
            'title_id' => '3',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Accomplishment statements are missing 1 of the following: action, task or result',
            'title_id' => '3',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Skills listed from past experiences are not transferable',
            'title_id' => '3',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Some reverse chronological order is used but is inconsistent throughout the resume',
            'title_id' => '3',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Missing 1 of the following: name of employer, location, job title or start/end dates',
            'title_id' => '3',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Use of some action verbs and specific examples to describe key accomplishments but inconsistent throughout',
            'title_id' => '3',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Resume does not highlight relevant experience tailored to the desired job position',
            'title_id' => '3',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Accomplishment statements are missing 2 of the following: action, task or result or uses responsibility statements or “duties included”',
            'title_id' => '3',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'No skills are listed for past experiences',
            'title_id' => '3',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Content is not listed in reverse chronological order',
            'title_id' => '3',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Missing 2 or more of the following: name of employer, location, job title or start/end dates',
            'title_id' => '3',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Uses “I” statements ',
            'title_id' => '3',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Uses official name of organization (no abbreviations), position held, and dates of involvement',
            'title_id' => '4',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'For leadership roles: uses bullet points to highlight accomplishments, skills and knowledge gained',
            'title_id' => '4',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'May include: honors, awards in roles, highlight transferable skills',
            'title_id' => '4',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => '1 or more is missing: official name of organization (no abbreviations), position held, ad dates of involvement',
            'title_id' => '4',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'For leadership roles: bullet points used to highlight accomplishments, skills and knowledge gained are vague or unclear',
            'title_id' => '4',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => '2 or more is missing: official name of organization (no abbreviations), position held, and dates of involvement',
            'title_id' => '4',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'For leadership roles: bullet points highlighting accomplishments, skills, and knowledge gained are missing',
            'title_id' => '4',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Font size is consistent and professional',
            'title_id' => '5',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Font size is readable',
            'title_id' => '5',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Resume design is consistent with professional practice (i.e. graphic design, theatre, accounting, etc.)',
            'title_id' => '5',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Key points are highlighted by the use of bold, italics, underlining or bullet points',
            'title_id' => '5',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Name is larger than other content',
            'title_id' => '5',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => '5-1in. margins',
            'title_id' => '5',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Font style is Arial',
            'title_id' => '5',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Consistency throughout the resume including alignment, bolding, italics, how dates are listed, etc',
            'title_id' => '5',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Category headings separate content',
            'title_id' => '5',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'If two pages, second page is at least a half page',
            'title_id' => '5',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Font style are acceptable',
            'title_id' => '5',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Font size is inappropriate',
            'title_id' => '5',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Resume appears to be in template format (readily available)',
            'title_id' => '5',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Key points and skills are not highlighted by the use of bold, italics, underlining or bullet points',
            'title_id' => '5',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Name does not stand out',
            'title_id' => '5',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Margins are acceptable but resume contains some extra “white space” or overcrowding',
            'title_id' => '5',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Name does not stand out',
            'title_id' => '5',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Some category headings are used to separate content',
            'title_id' => '5',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Fonts are distracting or they are not easy to read, may be too large or small',
            'title_id' => '5',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Inconsistent use of special characters or styles included',
            'title_id' => '5',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Key points and skills are not identifiable and information is hard to find',
            'title_id' => '5',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Name is difficult to find and does not stand out',
            'title_id' => '5',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Uses extraneous “white space” or resume is overcrowded',
            'title_id' => '5',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Inconsistent use of alignment, bolding, italics, and how dates are listed',
            'title_id' => '5',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'No category headings used to separate content',
            'title_id' => '5',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'If two pages, second page is less than a half page',
            'title_id' => '5',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Uses reverse chronological order when listing items within categories',
            'title_id' => '6',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Uses categories that showcases strengths while matching position requirements',
            'title_id' => '6',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Most relevant items for position are listed on top half of resume',
            'title_id' => '6',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Listing of items in reverse chronological order within categories is inconsistent',
            'title_id' => '6',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Categories accurately reflect contents, but may not showcase strengths while matching position requirements',
            'title_id' => '6',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Most relevant items for position are spread throughout the resume',
            'title_id' => '6',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Listing of items is not in reverse chronological order within categories',
            'title_id' => '6',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Categories do not accurately reflect contents',
            'title_id' => '6',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Items are general in nature and do not appear to have been organized for a specific position/purpose',
            'title_id' => '6',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Correct spelling, punctuation',
            'title_id' => '7',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Correct grammar (verb tense, pronouns)',
            'title_id' => '7',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Appropriate abbreviations are utilized',
            'title_id' => '7',
            'rating_id' => '1',
        ]);
        App\RubricCategory::create([
            'name' => 'Punctuation not consistent',
            'title_id' => '7',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Categories accurately reflect contents, but may not showcase strengths while matching position requirements',
            'title_id' => '7',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Most relevant items for position are spread throughout the resume',
            'title_id' => '7',
            'rating_id' => '2',
        ]);
        App\RubricCategory::create([
            'name' => 'Resume contains 3 or more spelling, grammar, and/or punctuation errors',
            'title_id' => '7',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Personal pronouns are used',
            'title_id' => '7',
            'rating_id' => '3',
        ]);
        App\RubricCategory::create([
            'name' => 'Abbreviations are incorrect',
            'title_id' => '7',
            'rating_id' => '3',
        ]);
    }
}
