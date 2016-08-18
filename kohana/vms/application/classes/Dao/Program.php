<?php

/**
 * 直播数据处理
 * @author gengyangyang
 * @date 2016-07-26 01:39:13
 * @email gengyangyang@gomeplus.com
 */
class Dao_Program extends Dao {

        protected $_db = 'video';
        protected $_tableName = 'program';
        protected $_primaryKey = 'program_id';
        protected $_modelName = 'Model_Program';

        const STATUS_DELETED = - 1; // 状态-删除
        const STATUS_DEFAULT = 0; // 状态
        const STATUS_OFF = 0; // 状态-下线
        const STATUS_ON = 1; // 状态-正常
        const APPROVE_TODO = 0; // 待审核
        const APPROVE_FAILED = - 1; // 不通过
        const APPROVE_SUCCESS = 1; // 通过
        const DAY_SECOND = 84000; //一天的秒数

        /**
         * 添加记录
         */

        public function insert(array $values = array()) {
                return DB::insert($this->_tableName)
                                ->columns(array_keys($values))
                                ->values(array_values($values))
                                ->execute($this->_db);
        }

        /**
         * 获取节目列表
         * @param int $number
         * @param int $offset
         */
        public function getPrograms($number = 20, $offset = 0, $params = array()) {
                $select = DB::select('*')
                        ->from($this->_tableName)
                        ->where('status', '=', self::STATUS_DEFAULT);
                if ($params['program_status']) {
                        switch ($params['program_status']) {
                                case 1:
                                        $select->where('start_time', '<', time());
                                        $select->where('end_time', '>', time());
                                        break;
                                case 2:
                                        $select->where('start_time', '>', time());
                                        break;
                                case 3:
                                        $select->where('end_time', '<', time());
                                        break;
                                default:
                                        break;
                        }
                }
                if ($params['start_date']) {
                        $select->where('start_time', '>', $params['start_date']);
                        $select->where('start_time', '<', $params['start_date'] + self::DAY_SECOND);
                }
                if ($params['keyword']) {
                        $select->where('title', 'LIKE', '%' . $params['keyword'] . '%');
                        $select->or_where($this->_primaryKey, '=', $params['keyword']);
                }
                return $select->order_by($this->_primaryKey, 'DESC')
                                ->limit($number)
                                ->offset($offset)
                                ->as_object($this->_modelName)
                                ->execute($this->_db);
        }

        /**
         * 通过program_id获取节目信息
         * @param type $programId
         * @return type
         */
        public function getProgramByProgramId($programId = 0) {
                return DB::select('*')
                                ->from($this->_tableName)
                                ->where($this->_primaryKey, '=', $programId)
                                ->as_object($this->_modelName)
                                ->execute($this->_db);
        }

        /**
         * 通过programid修改节目
         * @param int $programId
         * @param array $values
         */
        public function updateByProgramId($programId = 0, array $values = array()) {
                return DB::update($this->_tableName)
                                ->set($values)
                                ->where($this->_primaryKey, '=', $programId)
                                ->execute($this->_db);
        }

        /**
         * 统计program总量
         * @param str $params
         * @return array
         */
        public function countPrograms($params = array()) {
                $select = DB::select(DB::expr('COUNT(*) AS programCount'))
                        ->from($this->_tableName)
                        ->where('status', '=', self::STATUS_DEFAULT);
                if ($params['program_status']) {
                        switch ($params['program_status']) {
                                case 1:
                                        $select->where('start_time', '<', time());
                                        $select->where('end_time', '>', time());
                                        break;
                                case 2:
                                        $select->where('start_time', '>', time());
                                        break;
                                case 3:
                                        $select->where('end_time', '<', time());
                                        break;
                                default:
                                        break;
                        }
                }
                if ($params['start_date']) {
                        $select->where('start_time', '>', $params['start_date']);
                        $select->where('start_time', '<', $params['start_date'] + self::DAY_SECOND);
                }
                if ($params['keyword']) {
                        $select->where('title', 'LIKE', '%' . $params['keyword'] . '%');
                        $select->or_where($this->_primaryKey, '=', $params['keyword']);
                }
                return $select->execute($this->_db)
                                ->get('programCount');
        }

        /**
         * 下线一个节目
         * @param type $ProgramId
         * @return type
         */
        public function deleteProgramByProgramId($ProgramId) {
                return DB::update($this->_tableName)
                                ->set(array('status' => self::STATUS_DELETED))
                                ->where($this->_primaryKey, '=', $ProgramId)
                                ->execute($this->_db);
        }

}
