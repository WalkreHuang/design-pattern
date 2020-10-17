## Review 代码设计与实现

前面讲到了 SOLID、KISS、DRY、YAGNI、LOD 等设计原则，基于接口而非实现编程、多用组合少用继承、高内聚低耦合等设计思想。我们现在就来看下，上面的代码实现是否符合这些设计原则和思想。



#### MetricsCollector

MetricsCollector 负责采集和存储数据，职责相对来说还算比较单一。它基于接口而非实现编程，通过依赖注入的方式来传递 MetricsStorage 对象，可以在不需要修改代码的情况下，灵活地替换不同的存储方式，满足开闭原则。

#### MetricsStorage、RedisMetricsStorage

MetricsStorage 和 RedisMetricsStorage 的设计比较简单。当我们需要实现新的存储方式的时候，只需要实现 MetricsStorage 接口即可。因为所有用到 MetricsStorage 和 RedisMetricsStorage 的地方，都是基于相同的接口函数来编程的，所以，除了在组装类的地方有所改动（从 RedisMetricsStorage 改为新的存储实现类），其他接口函数调用的地方都不需要改动，满足开闭原则。

#### Aggregator

Aggregator 类是一个工具类，里面只有一个静态函数，有 50 行左右的代码量，负责各种统计数据的计算。当需要扩展新的统计功能的时候，需要修改 aggregate() 函数代码，并且一旦越来越多的统计功能添加进来之后，这个函数的代码量会持续增加，可读性、可维护性就变差了。所以，从刚刚的分析来看，这个类的设计可能存在职责不够单一、不易扩展等问题，需要在之后的版本中，对其结构做优化。

#### ConsoleReporter

整个类负责的事情比较多，职责不是太单一。特别是显示部分的代码，可能会比较复杂（比如展示方式），最好是将显示部分的代码逻辑拆分成独立的类。

