<?php

use App\Option;
use App\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $q = Question::create([
            'content' => '您了解学校档案馆的职能吗？',
            'seq' => 2,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '很了解']),
            new Option(['content' => '有些了解']),
            new Option(['content' => '不了解']),
        ]);

        $q = Question::create([
            'content' => '您知道学校档案馆所在办公地址吗？',
            'seq' => 3,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '不知道']),
            new Option(['content' => '知道']),
        ]);

        $q = Question::create([
            'content' => '您希望通过何种方式了解学校档案馆？',
            'seq' => 4,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '到学校档案馆利用档案']),
            new Option(['content' => '通过学校档案馆网站了解']),
            new Option(['content' => '学校档案馆宣传材料']),
            new Option(['content' => '档案展览']),
            new Option(['content' => '听别人介绍']),
        ]);

        $q = Question::create([
            'content' => '您到过学校档案馆查阅档案吗？',
            'seq' => 5,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '查阅过档案']),
            new Option(['content' => '从未查阅过档案']),
            new Option(['content' => '可能会去利用档案']),
        ]);

        $q = Question::create([
            'content' => '您对学校档案馆工作人员的服务态度是否满意？',
            'seq' => 6,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '满意']),
            new Option(['content' => '比较满意']),
            new Option(['content' => '不满意']),
            new Option(['content' => '不了解']),
        ]);

        $q = Question::create([
            'content' => '您对学校档案馆工作人员服务效率是否满意？',
            'seq' => 7,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '满意']),
            new Option(['content' => '比较满意']),
            new Option(['content' => '不满意']),
            new Option(['content' => '不了解']),
        ]);

        $q = Question::create([
            'content' => '您对学校档案馆的阅档环境是否满意？',
            'seq' => 8,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '满意']),
            new Option(['content' => '比较满意']),
            new Option(['content' => '不满意']),
            new Option(['content' => '不了解']),
        ]);

        $q = Question::create([
            'content' => '您认为学校档案馆利用档案手续复杂吗？',
            'seq' => 9,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '复杂']),
            new Option(['content' => '不复杂']),
            new Option(['content' => '不了解']),
        ]);

        $q = Question::create([
            'content' => '您希望哪种档案利用方式？',
            'type' => 1,
            'seq' => 10,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '来档案馆查询']),
            new Option(['content' => '电话咨询']),
            new Option(['content' => '网上查询']),
            new Option(['content' => '其他方式']),
        ]);

        $q = Question::create([
            'content' => '您希望学校档案馆为您提供哪些服务项目？',
            'type' => 1,
            'seq' => 11,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '档案有关证明']),
            new Option(['content' => '档案信息咨询']),
            new Option(['content' => '网络信息检索服务']),
            new Option(['content' => '提供数字档案']),
            new Option(['content' => '个人重要材料保管']),
            new Option(['content' => '档案展览或陈列']),
            new Option(['content' => '档案整理指导']),
            new Option(['content' => '档案鉴赏']),
            new Option(['content' => '其他']),
        ]);

        $q = Question::create([
            'content' => '您认为学校档案馆在档案服务利用方面存在哪些问题？',
            'type' => 1,
            'seq' => 12,
        ]);
        $q->options()->saveMany([
            new Option(['content' => '馆藏不够丰富']),
            new Option(['content' => '服务项目偏少']),
            new Option(['content' => '检索方式单一']),
            new Option(['content' => '服务设施落后']),
            new Option(['content' => '数字档案偏少']),
        ]);

        $q = Question::create([
            'content' => '您对学校档案馆改进管理服务有何建议？',
            'seq' => 13,
        ]);
    }
}
