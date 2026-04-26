<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class ServicesController extends Controller
{
    public function index(): View
    {
        return view('services.index');
    }

    public function advisory(): View
    {
        return view('services.advisory', [
            'service' => [
                'title'       => __('services.advisory.title'),
                'tagline'     => __('services.advisory.tagline'),
                'description' => __('services.advisory.description'),
                'icon'        => 'brain',
                'color'       => 'blue',
                'benefits'    => [
                    __('services.advisory.benefit_1'),
                    __('services.advisory.benefit_2'),
                    __('services.advisory.benefit_3'),
                    __('services.advisory.benefit_4'),
                    __('services.advisory.benefit_5'),
                ],
                'deliverables' => [
                    __('services.advisory.deliverable_1'),
                    __('services.advisory.deliverable_2'),
                    __('services.advisory.deliverable_3'),
                    __('services.advisory.deliverable_4'),
                    __('services.advisory.deliverable_5'),
                ],
                'process' => [
                    ['step' => '01', 'title' => __('services.advisory.process_1_title'), 'desc' => __('services.advisory.process_1_desc')],
                    ['step' => '02', 'title' => __('services.advisory.process_2_title'), 'desc' => __('services.advisory.process_2_desc')],
                    ['step' => '03', 'title' => __('services.advisory.process_3_title'), 'desc' => __('services.advisory.process_3_desc')],
                    ['step' => '04', 'title' => __('services.advisory.process_4_title'), 'desc' => __('services.advisory.process_4_desc')],
                    ['step' => '05', 'title' => __('services.advisory.process_5_title'), 'desc' => __('services.advisory.process_5_desc')],
                ],
                'cta_text'  => __('services.advisory.cta'),
                'cta_route' => 'consultation',
                'faqs' => [
                    ['q' => __('services.advisory.faq_1_q'), 'a' => __('services.advisory.faq_1_a')],
                    ['q' => __('services.advisory.faq_2_q'), 'a' => __('services.advisory.faq_2_a')],
                    ['q' => __('services.advisory.faq_3_q'), 'a' => __('services.advisory.faq_3_a')],
                ],
            ],
        ]);
    }

    public function copilot(): View
    {
        return view('services.copilot', [
            'service' => [
                'title'       => __('services.copilot.title'),
                'tagline'     => __('services.copilot.tagline'),
                'description' => __('services.copilot.description'),
                'icon'        => 'cpu',
                'color'       => 'indigo',
                'benefits'    => [
                    __('services.copilot.benefit_1'),
                    __('services.copilot.benefit_2'),
                    __('services.copilot.benefit_3'),
                    __('services.copilot.benefit_4'),
                    __('services.copilot.benefit_5'),
                ],
                'deliverables' => [
                    __('services.copilot.deliverable_1'),
                    __('services.copilot.deliverable_2'),
                    __('services.copilot.deliverable_3'),
                    __('services.copilot.deliverable_4'),
                    __('services.copilot.deliverable_5'),
                ],
                'process' => [
                    ['step' => '01', 'title' => __('services.copilot.process_1_title'), 'desc' => __('services.copilot.process_1_desc')],
                    ['step' => '02', 'title' => __('services.copilot.process_2_title'), 'desc' => __('services.copilot.process_2_desc')],
                    ['step' => '03', 'title' => __('services.copilot.process_3_title'), 'desc' => __('services.copilot.process_3_desc')],
                    ['step' => '04', 'title' => __('services.copilot.process_4_title'), 'desc' => __('services.copilot.process_4_desc')],
                    ['step' => '05', 'title' => __('services.copilot.process_5_title'), 'desc' => __('services.copilot.process_5_desc')],
                ],
                'cta_text'  => __('services.copilot.cta'),
                'cta_route' => 'consultation',
                'faqs' => [
                    ['q' => __('services.copilot.faq_1_q'), 'a' => __('services.copilot.faq_1_a')],
                    ['q' => __('services.copilot.faq_2_q'), 'a' => __('services.copilot.faq_2_a')],
                    ['q' => __('services.copilot.faq_3_q'), 'a' => __('services.copilot.faq_3_a')],
                ],
            ],
        ]);
    }

    public function voiceai(): View
    {
        return view('services.voiceai', [
            'service' => [
                'title'       => __('services.voiceai.title'),
                'tagline'     => __('services.voiceai.tagline'),
                'description' => __('services.voiceai.description'),
                'icon'        => 'microphone',
                'color'       => 'violet',
                'benefits'    => [
                    __('services.voiceai.benefit_1'),
                    __('services.voiceai.benefit_2'),
                    __('services.voiceai.benefit_3'),
                    __('services.voiceai.benefit_4'),
                    __('services.voiceai.benefit_5'),
                ],
                'deliverables' => [
                    __('services.voiceai.deliverable_1'),
                    __('services.voiceai.deliverable_2'),
                    __('services.voiceai.deliverable_3'),
                    __('services.voiceai.deliverable_4'),
                    __('services.voiceai.deliverable_5'),
                ],
                'process' => [
                    ['step' => '01', 'title' => __('services.voiceai.process_1_title'), 'desc' => __('services.voiceai.process_1_desc')],
                    ['step' => '02', 'title' => __('services.voiceai.process_2_title'), 'desc' => __('services.voiceai.process_2_desc')],
                    ['step' => '03', 'title' => __('services.voiceai.process_3_title'), 'desc' => __('services.voiceai.process_3_desc')],
                    ['step' => '04', 'title' => __('services.voiceai.process_4_title'), 'desc' => __('services.voiceai.process_4_desc')],
                    ['step' => '05', 'title' => __('services.voiceai.process_5_title'), 'desc' => __('services.voiceai.process_5_desc')],
                ],
                'cta_text'  => __('services.voiceai.cta'),
                'cta_route' => 'consultation',
                'faqs' => [
                    ['q' => __('services.voiceai.faq_1_q'), 'a' => __('services.voiceai.faq_1_a')],
                    ['q' => __('services.voiceai.faq_2_q'), 'a' => __('services.voiceai.faq_2_a')],
                    ['q' => __('services.voiceai.faq_3_q'), 'a' => __('services.voiceai.faq_3_a')],
                ],
            ],
        ]);
    }

    public function retainers(): View
    {
        return view('services.retainers', [
            'service' => [
                'title'       => __('services.retainers.title'),
                'tagline'     => __('services.retainers.tagline'),
                'description' => __('services.retainers.description'),
                'icon'        => 'shield-check',
                'color'       => 'emerald',
                'benefits'    => [
                    __('services.retainers.benefit_1'),
                    __('services.retainers.benefit_2'),
                    __('services.retainers.benefit_3'),
                    __('services.retainers.benefit_4'),
                    __('services.retainers.benefit_5'),
                ],
                'deliverables' => [
                    __('services.retainers.deliverable_1'),
                    __('services.retainers.deliverable_2'),
                    __('services.retainers.deliverable_3'),
                    __('services.retainers.deliverable_4'),
                    __('services.retainers.deliverable_5'),
                ],
                'process' => [
                    ['step' => '01', 'title' => __('services.retainers.process_1_title'), 'desc' => __('services.retainers.process_1_desc')],
                    ['step' => '02', 'title' => __('services.retainers.process_2_title'), 'desc' => __('services.retainers.process_2_desc')],
                    ['step' => '03', 'title' => __('services.retainers.process_3_title'), 'desc' => __('services.retainers.process_3_desc')],
                    ['step' => '04', 'title' => __('services.retainers.process_4_title'), 'desc' => __('services.retainers.process_4_desc')],
                    ['step' => '05', 'title' => __('services.retainers.process_5_title'), 'desc' => __('services.retainers.process_5_desc')],
                ],
                'cta_text'  => __('services.retainers.cta'),
                'cta_route' => 'consultation',
                'faqs' => [
                    ['q' => __('services.retainers.faq_1_q'), 'a' => __('services.retainers.faq_1_a')],
                    ['q' => __('services.retainers.faq_2_q'), 'a' => __('services.retainers.faq_2_a')],
                    ['q' => __('services.retainers.faq_3_q'), 'a' => __('services.retainers.faq_3_a')],
                ],
            ],
        ]);
    }

    public function founder(): View
    {
        return view('services.founder', [
            'service' => [
                'title'       => __('services.founder.title'),
                'tagline'     => __('services.founder.tagline'),
                'description' => __('services.founder.description'),
                'icon'        => 'rocket',
                'color'       => 'orange',
                'benefits'    => [
                    __('services.founder.benefit_1'),
                    __('services.founder.benefit_2'),
                    __('services.founder.benefit_3'),
                    __('services.founder.benefit_4'),
                    __('services.founder.benefit_5'),
                ],
                'deliverables' => [
                    __('services.founder.deliverable_1'),
                    __('services.founder.deliverable_2'),
                    __('services.founder.deliverable_3'),
                    __('services.founder.deliverable_4'),
                    __('services.founder.deliverable_5'),
                ],
                'process' => [
                    ['step' => '01', 'title' => __('services.founder.process_1_title'), 'desc' => __('services.founder.process_1_desc')],
                    ['step' => '02', 'title' => __('services.founder.process_2_title'), 'desc' => __('services.founder.process_2_desc')],
                    ['step' => '03', 'title' => __('services.founder.process_3_title'), 'desc' => __('services.founder.process_3_desc')],
                    ['step' => '04', 'title' => __('services.founder.process_4_title'), 'desc' => __('services.founder.process_4_desc')],
                    ['step' => '05', 'title' => __('services.founder.process_5_title'), 'desc' => __('services.founder.process_5_desc')],
                ],
                'cta_text'  => __('services.founder.cta'),
                'cta_route' => 'consultation',
                'faqs' => [
                    ['q' => __('services.founder.faq_1_q'), 'a' => __('services.founder.faq_1_a')],
                    ['q' => __('services.founder.faq_2_q'), 'a' => __('services.founder.faq_2_a')],
                    ['q' => __('services.founder.faq_3_q'), 'a' => __('services.founder.faq_3_a')],
                ],
            ],
        ]);
    }
}
