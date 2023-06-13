package ru.mrmarvel.camoletapp.ui

import android.view.SurfaceHolder
import android.view.SurfaceView
import androidx.compose.animation.AnimatedVisibility
import androidx.compose.animation.fadeIn
import androidx.compose.animation.fadeOut
import androidx.compose.foundation.background
import androidx.compose.foundation.layout.Box
import androidx.compose.foundation.layout.fillMaxSize
import androidx.compose.foundation.layout.fillMaxWidth
import androidx.compose.foundation.layout.width
import androidx.compose.runtime.Composable
import androidx.compose.ui.Alignment
import androidx.compose.ui.Modifier
import androidx.compose.ui.graphics.Color
import androidx.compose.ui.platform.LocalConfiguration
import androidx.compose.ui.platform.LocalContext
import androidx.compose.ui.platform.LocalLifecycleOwner
import androidx.compose.ui.unit.dp
import androidx.compose.ui.viewinterop.AndroidView
import com.tencent.yolov8ncnn.Yolov8Ncnn
import ru.mrmarvel.camoletapp.util.findActivity

@Composable
fun CameraFragment(yolov8Ncnn: Yolov8Ncnn, modifier: Modifier = Modifier) {
    val context = LocalContext.current
    val lifecycleOwner = LocalLifecycleOwner.current
    val configuration = LocalConfiguration.current
    val screeHeight = configuration.screenHeightDp.dp
    val screenWidth = configuration.screenWidthDp.dp
    Box(modifier = modifier
        .fillMaxSize()
        .background(Color.Black),
        contentAlignment = Alignment.CenterStart
    ) {
        AnimatedVisibility(visible = true,
            enter = fadeIn(),
            exit = fadeOut()
        ) {
            Box(
                Modifier
                    // FORCE FILL
                    .fillMaxWidth()
                    .width(screenWidth * 0.97f)) {
                AndroidView(
                    factory = {
                        SurfaceView(context).apply {
                            holder.addCallback(object : SurfaceHolder.Callback {
                                override fun surfaceCreated(p0: SurfaceHolder) {
                                    yolov8Ncnn.loadModel(
                                        context.findActivity().assets,
                                        0,
                                        0
                                    )
                                }

                                override fun surfaceChanged(
                                    p0: SurfaceHolder,
                                    p1: Int,
                                    p2: Int,
                                    p3: Int
                                ) {
                                    yolov8Ncnn.openCamera(1)
                                    yolov8Ncnn.setOutputWindow(p0.surface)
                                }

                                override fun surfaceDestroyed(p0: SurfaceHolder) {
                                    yolov8Ncnn.closeCamera()
                                }

                            })
                        }
                    },
                    modifier = Modifier
                )
            }
        }
    }
}