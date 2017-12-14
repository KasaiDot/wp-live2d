var LAppDefine = {
    DEBUG_LOG:false,
    DEBUG_MOUSE_LOG:false,
    DEBUG_DRAW_HIT_AREA:false,
    DEBUG_DRAW_ALPHA_MODEL:false,

    VIEW_MAX_SCALE:2,
    VIEW_MIN_SCALE:0.1,

    VIEW_LOGICAL_LEFT:-1,
    VIEW_LOGICAL_RIGHT:1,

    VIEW_LOGICAL_MAX_LEFT:-2,
    VIEW_LOGICAL_MAX_RIGHT:2,
    VIEW_LOGICAL_MAX_BOTTOM:-2,
    VIEW_LOGICAL_MAX_TOP:2,

    PRIORITY_NONE:0,
    PRIORITY_IDLE:1,
    PRIORITY_NORMAL:2,
    PRIORITY_FORCE:3,

    BACK_IMAGE_NAME:"textures/3.png",

    MODEL_DEFAULT:{
        model:"model.moc",
        modelHomeDir:"/wp-content/plugins/wp-live2d/model/default/",
        textures:[
            "textures/0.png",
            "textures/1.png",
            "textures/2.png",
            "textures/3.png"
        ],
        motions:{
            idle:[
                {
                    file:"motions/idle/0.mtn",
                    "fade_in":2000,
                    "fade_out":2000
                },{
                    file:"motions/idle/1.mtn",
                    "fade_in":2000,
                    "fade_out":2000
                }
            ],
            thanking:[
                {
                    file:"motions/thanking/0.mtn",
                    "fade_in":2000,
                    "fade_out":2000
                }
            ]
        }
    },
    MODEL_DEFAULT_XMAS:{
        model:"model.moc",
        modelHomeDir:"/wp-content/plugins/wp-live2d/model/default-xmas/",
        textures:[
            "textures/0.png",
            "textures/1.png",
            "textures/2.png",
            "textures/3.png"
        ],
        motions:{
            idle:[
                {
                    file:"motions/idle/0.mtn",
                    "fade_in":2000,
                    "fade_out":2000
                },{
                    file:"motions/idle/1.mtn",
                    "fade_in":2000,
                    "fade_out":2000
                }
            ],
            thanking:[
                {
                    file:"motions/thanking/0.mtn",
                    "fade_in":2000,
                    "fade_out":2000
                }
            ]
        }
    },

    MOTION_GROUP_IDLE:"idle",
    MOTION_GROUP_TAP_BODY:"thanking",
    MOTION_GROUP_FLICK_HEAD:"flick_head",
    MOTION_GROUP_PINCH_IN:"pinch_in",
    MOTION_GROUP_PINCH_OUT:"pinch_out",
    MOTION_GROUP_SHAKE:"shake",

    HIT_AREA_HEAD:"head",
    HIT_AREA_BODY:"body"
};
