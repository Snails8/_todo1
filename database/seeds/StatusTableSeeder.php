<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertStatus('01', '未着手');
        $this->insertStatus('02', '対応中');
        $this->insertStatus('03', '完了');
        $this->insertStatus('04', 'キャンセル');
        //
    }
 :   /**
     * 
     * @param String $statusId
     * @param String $statusName
     */
    private function insertStatus(String $statusId, String $statusName)
    {
        $now = Carbon::now();
        $status = [
            'status_id'   => $statusId,
            'status_name' => $statusName,
            'created_at'  => $now,
            'updated_at'  => $now
        ];
        DB::table('status')->insert($status);
    }
}
