<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Cache;
use PhpSms;

class SendVerifyCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $phone;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // 产生一个4位数字
        $code = str_random(4);
        
        // 存入到缓存中，10min后过期
        Cache::put($this->phone, $code, 10);

        $content = "【惊豆】您的验证码为{$code}";
        
        $templates = [
            'YunPian'=>env('YUNPIAN_TEMPLATE_VERIFYCODE_ID', '1acfa80b7b38456bb6d6bac85469ce7b')
        ];

        $templateData = [
            'code' => $code
        ];

        PhpSms::make()->to($this->phone)
            ->template($templates)
            ->data($templateData)
            ->content($content)
            ->send();
    }
}
