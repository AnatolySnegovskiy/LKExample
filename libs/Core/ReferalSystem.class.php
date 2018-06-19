<?php

final class ReferalSystem extends Base
{
    private $procent =
        [
            'user' => [5, 3, 2],
            'partner' => [10, 3, 2],
            'vip' => [10, 3, 2],
        ];

    /**
     * @param int $summ
     * @param array $user
     * @param int $level
     * @return bool
     * @throws Exception
     */
    private function addUserBonus($summ, $user, $level)
    {
        $bonusProcent = $this->procent[$user['status']][$level];
        $bonusSumm = $summ * $bonusProcent / 100;

        $dataUpdate = ['balance', 'balance + ' . $bonusSumm];
        $dataWhere = ['id', $user['id']];

        DB::UpdateData('users', $dataUpdate, $dataWhere);

        return $bonusSumm;
    }

    /**
     * @param $userId
     * @return array
     * @throws Exception
     */
    private function getReferalInfo($userId)
    {
        $dataWhere = ['id' => $userId];
        $dataSelect = ['id', 'status', 'referal'];
        $userData = DB::SelectData('users', $dataWhere, $dataSelect);

        if (empty($userData['id'])) {
            return ['id' => 1, 'status' => 'vip', 'referal' => 1];
        }

        return $userData;
    }

    /**
     * @param int $summ
     * @param int $userId
     * @param string $userName
     * @param string $paymentSystem
     * @throws Exception
     */
    public function chargeBonus($summ, $userId, $userName, $paymentSystem)
    {
        $userReferal = $this->getReferalInfo($userId);
        $userId = $userReferal['referal'];

        for ($level = 0; $level <= 2; $level++) {
            $referal = $this->getReferalInfo($userId);
            $bonusSumm = $this->addUserBonus($summ, $referal, $level);
            $this->addHistory(
                $referal['id'],
                sprintf(
                    'Начислены бонусы %s уровня за инвестицию %s через %s',
                    $level + 1,
                    $userName,
                    $paymentSystem
                ),
                $bonusSumm
            );
            $userId = $referal['referal'];
        }
    }
}